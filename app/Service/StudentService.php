<?php

namespace App\Service;

use App\Enums\DocPostulationEnum;
use App\Enums\RolesEnum;
use App\Enums\ShiftEnum;
use App\Enums\StatePostulationEnum;
use App\Models\Information\TypeDocumentPostulation;
use App\Models\Postulation;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Service\UserService;
use App\Models\User;
use App\Models\Student;
use App\Repositories\Interfaces\DocumentPostulationRepositoryInterface;
use App\Repositories\Interfaces\InternshipRepositoryInterface;
use App\Repositories\Interfaces\PostulationRepositoryInterface;
use App\Repositories\InternshipRepository;
use App\Repositories\PhoneRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentService
{
    public function __construct(
        private readonly StudentRepositoryInterface $studentRepository,
        private readonly UserService $userService,
        private readonly PostulationRepositoryInterface $postulationRepository,
        private readonly InternshipRepositoryInterface $internshipRepository,
        private readonly DocumentPostulationRepositoryInterface $documentPostulationRepository,
    ) {
    }

    public function create(array $data): Student
    {

        if (
            $this->studentRepository->findByName(
                $data['first_name'],
                $data['last_name']
            )
        ) {
            throw new \Exception("El estudiante ya ha sido registrado");
        }

        return DB::transaction(function () use ($data) {
            $student = $this->studentRepository->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'semester' => $data['semester'],
                'ru' => $data['ru'],
                'shift_id' => $data['shift_id'],
                'career_id' => $data['career_id']
            ]);

            $newUser = $this->userService->create([
                'email' => $data['email'],
                'password' => $data['password'],
                'name' => $student->full_name
            ], RolesEnum::STUDENT);

            $student->user()->associate($newUser);
            $student->save();

            return $student;
        });
    }


    public function find(int $idStudent): Student
    {
        $student = $this->studentRepository->get($idStudent);
        if (is_null($student)) {
            throw new \Exception("No se encontró al estudiante");
        }

        return $student;
    }

    public function postulation(int $idStudent, int $idInternship)
    {
        $student = $this->studentRepository->get($idStudent);
        // Verificamos que el estudiante exista
        if (is_null($student)) {
            throw new \Exception("No se encontró al estudiante");
        }

        $internship = $this->internshipRepository->find($idInternship);

        // Verificamos que la pasantía exista
        if (is_null($internship)) {
            throw new \Exception("No existe la pasantía al postularse");
        }

        // Verificamos que el estudiante no haya postulado ya a esa pasantía
        $existingPostulation = $this
            ->postulationRepository
            ->getStudentInternshipPostulation($student->id, $internship->id);
        if (!is_null($existingPostulation)) {
            throw new \Exception("El estudiante ya ha postulado a esta pasantía");
        }

        $actualPostulations = $this
            ->postulationRepository
            ->getPostulationsInternshipAccepted($internship->id);

        // Verificamos que existan vacantes en la pasantía
        if ($actualPostulations->count() >= $internship->vacant) {
            throw new \Exception("Ya no existen vacantes para la postulation");
        }

        $this->postulationRepository->create([
            "student_id" => $student->id,
            "internship_id" => $internship->id,
            "status" => StatePostulationEnum::CREATED
        ]);
    }

    public function enableInternships(int $idStudent)
    {

        $student = $this->studentRepository->get($idStudent);

        if (is_null($student)) {
            throw new \Exception("No se encontró el estudiante");
        }
        //dd($student->id);

        $entry_time = $student->shift->entry_time;
        $exit_time = $student->shift->exit_time;

        // Espacio entre la U y la pasantía de 45 minutos
        $min_default = 45;

        $shiftEnum = $student->shift->id;

        $beforeInternships = new Collection();
        $afterInternship = new Collection();
        switch ($shiftEnum) {
            case (ShiftEnum::MORNING):
                $beforeInternships = $this
                    ->internshipRepository
                    ->getInternshipsAfter($exit_time, $min_default);
                break;
            case (ShiftEnum::AFTERNOON):
                $beforeInternships = $this
                    ->internshipRepository
                    ->getInternshipsAfter($exit_time, $min_default);
                $afterInternship = $this
                    ->internshipRepository
                    ->getInternshipsBefore($entry_time, $min_default);
                break;
            case (ShiftEnum::NIGHT):
                $afterInternship = $this
                    ->internshipRepository
                    ->getInternshipsBefore($entry_time, $min_default);
                break;
        }
        $internshipsAll = $afterInternship
            ->merge($beforeInternships)
            ->unique("id");

        $internshipsIds = $this->postulationRepository->getStudentPostulation($student->id);

        $internshipsFiltered = $internshipsAll
            ->whereNotIn('id', $internshipsIds)
            ->values();

        return $internshipsFiltered;
    }

    public function getPostulationCreated(int $idStudent)
    {
        if (is_null($this->studentRepository->get($idStudent))) {
            throw new \Exception("No se encontró al estudiante");
        }

        return $this->postulationRepository
            ->getPostulationsCreatedStudent($idStudent);
    }

    public function getPostulationSend(int $idStudent)
    {
        if (is_null($this->studentRepository->get($idStudent))) {
            throw new \Exception("No se encontró al estudiante");
        }

        return $this->postulationRepository
            ->getPostulationsSendStudent($idStudent);
    }

    public function delete(int $idStudent): void
    {
        $student = $this->studentRepository->get($idStudent);
        if (is_null($student)) {
            throw new \Exception("No se encontró al estudiante");
        }

        DB::transaction(function () use ($student) {
            // Eliminamos las postulaciones del estudiante
            // $this->postulationRepository->delete($student->id);

            // Eliminamos el usuario asociado al estudiante
            $this->userService->delete($student->user_id);

            // Finalmente, eliminamos el estudiante
            $this->studentRepository->delete($student->id);
        });
    }

    public function getPostulationById(int $idStudent, int $idPostulation)
    {
        $student = $this->studentRepository->get($idStudent);
        if (is_null($student)) {
            throw new \Exception("No se encontró al estudiante");
        }

        $postulation = $this->postulationRepository->get($idPostulation);
        if (is_null($postulation) || $postulation->student_id !== $student->id) {
            throw new \Exception("No se encontró la postulación para este estudiante");
        }

        return $postulation;
    }


    public function getDocumentPostulation(int $idPostulation)
    {
        $carnet = $this->documentPostulationRepository->find(
            $idPostulation,
            DocPostulationEnum::CARNET
        );
        $cv = $this->documentPostulationRepository->find(
            $idPostulation,
            DocPostulationEnum::CURRICULUM
        );

        $carta = $this->documentPostulationRepository->find(
            $idPostulation,
            DocPostulationEnum::CARTA
        );

        $historial = $this->documentPostulationRepository->find(
            $idPostulation,
            DocPostulationEnum::HISTORIAL
        );

        return new Collection([
            'carnet' => ['data' => $carnet, 'type' => DocPostulationEnum::CARNET],
            'cv' => ['data' => $cv, 'type' => DocPostulationEnum::CURRICULUM],
            'carta' => ['data' => $carta, 'type' => DocPostulationEnum::CARTA],
            'historial' => ['data' => $historial, 'type' => DocPostulationEnum::HISTORIAL]
        ]);
    }

    public function getDocuments() {
        return TypeDocumentPostulation::all();
    }
}

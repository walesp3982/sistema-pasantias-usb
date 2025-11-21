<?php

namespace App\Service;

use App\Enums\RolesEnum;
use App\Enums\StatePostulationEnum;
use App\Models\Postulation;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Service\UserService;
use App\Models\User;
use App\Models\Student;
use App\Repositories\Interfaces\IntershipRepositoryInterface;
use App\Repositories\Interfaces\PostulationRepositoryInterface;
use App\Repositories\IntershipRepository;
use App\Repositories\PhoneRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentService
{
    public function __construct(
        private readonly StudentRepositoryInterface $studentRepository,
        private readonly UserService $userService,
        private readonly PostulationRepositoryInterface $postulationRepository,
        private readonly IntershipRepositoryInterface $intershipRepository
    ) {}

    public function create(array $data):Student
    {

        if ($this->studentRepository->findByName(
            $data['first_name'],
            $data['last_name']
        )) {
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


    public function find(int $idStudent): Student {
        $student = $this->studentRepository->get($idStudent);
        if(is_null($student)) {
            throw new \Exception("No se encontró al estudiante");
        }

        return $student;
    }

    public function postulation(int $idStudent, int $idIntership) {
        $student = $this->studentRepository->get($idStudent);
        // Verificamos que el estudiante exista
        if(is_null($student)) {
            throw new \Exception("No se encontró al estudiante");
        }

        $intership = $this->intershipRepository->find($idIntership);

        // Verificamos que la pasantía exista
        if(is_null($intership)) {
            throw new \Exception("No existe la pasantía al postularse");
        }

        // Verificamos que el estudiante no haya postulado ya a esa pasantía
        $existingPostulation = $this
            ->postulationRepository
            ->getStudentIntershipPostulation($student->id, $intership->id);
        if(!is_null($existingPostulation)) {
            throw new \Exception("El estudiante ya ha postulado a esta pasantía");
        }

        $actualPostulations = $this
            ->postulationRepository
            ->getPostulationsIntershipAccepted($intership->id);
        
        if($actualPostulations->count() >= $intership->vacant) {
            throw new \Exception("Ya no existen vacantes para la postulation");
        }

        $this->postulationRepository->create([
            "student_id" => $student->id,
            "intership_id" => $intership->id,
            "status" => StatePostulationEnum::CREATED
        ]);
    }

    public function enableInterships(int $idStudent) {
        
        $student = $this->studentRepository->get($idStudent);

        if(is_null($student)) {
            throw new \Exception("No se encontró el estudiante");
        }
        $intershipsPostulate = $this->postulationRepository->getStudentPostulation($student->id);
        //dd($student->id);

        $interships=$this
            ->intershipRepository
            ->getStudentEnabledInterships(
                $student->career_id, 
                $intershipsPostulate);

        return $interships;
    }
}

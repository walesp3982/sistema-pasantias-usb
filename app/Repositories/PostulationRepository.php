<?php

namespace App\Repositories;

use App\Enums\StatePostulationEnum;
use App\Models\Postulation;
use App\Repositories\Interfaces\PostulationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostulationRepository implements PostulationRepositoryInterface
{
    public function __construct(
        private readonly Postulation $model
    ) {}
    public function create(array $data): Postulation
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $postulation = $this->model->findOrFail($id);

        return $postulation->update($data);
    }

    public function delete(int $id): bool
    {
        $postulation = $this->model->findOrFail($id);
        return $postulation->delete();
    }

    public function get(int $id): ?Postulation
    {
        return $this->model->find($id);
    }

    public function getPostulationsInternshipAccepted(int $idInternship): Collection
    {
        return $this->model
            ->where('internship_id', $idInternship)
            ->where("status", StatePostulationEnum::ACCEPT)
            ->get();
    }
    public function getStudentInternshipPostulation(int $idStudent, int $idInternship): ?Postulation {
        return $this->model
            ->where('student_id', $idStudent)
            ->where('internship_id', $idInternship)
            ->first();
    }

    public function getStudentPostulation(int $idStudent) {
        return $this->model
            ->where('student_id', $idStudent)
            ->pluck('internship_id')
            ->unique()
            ->toArray();
    }

    public function getPostulationsCreatedStudent(int $student_id):Collection {
        return $this->model
            ->with('internship.company', 'internship.location.zone.municipality')
            ->where('student_id', $student_id)
            ->where('status', StatePostulationEnum::CREATED)
            ->get();
    }

    public function getPostulationsSendStudent(int $student_id): Collection {
        return $this->model
            ->with('internship.company','internship.location.zone.municipality')
            ->where('student_id', $student_id)
            ->where('status', StatePostulationEnum::SEND)
            ->get();
        
    }

    public function getStudentActualInterships(int $idStudent) {
        return Postulation::status(StatePostulationEnum::ACCEPT)
            ->current()
            ->with('internship.company', 'internship.location.zone.municipality')
            ->where("student_id", $idStudent)
            ->first();
    }

    public function getStudentFinishedInterships(int $idStudent) {
        return Postulation::status(StatePostulationEnum::ACCEPT)
            ->finished()
            ->with('internship.company', 'internship.location.zone.municipality')
            ->where("student_id", $idStudent)
            ->get();
    }
    
    public function getStudentWaitInterships(int $idStudent) {
        return Postulation::status(StatePostulationEnum::ACCEPT)
            ->wait()
            ->with('internship.company', 'internship.location.zone.municipality')
            ->where("student_id", $idStudent)
            ->get();
    }
}

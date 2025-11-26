<?php

namespace App\Repositories\Interfaces;

use App\Models\Postulation;
use Illuminate\Database\Eloquent\Collection;

interface PostulationRepositoryInterface {
    public function create(array $data): Postulation;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function get(int $id): ?Postulation;

    public function getPostulationsInternshipAccepted(int $idInternship): Collection;

    public function getStudentInternshipPostulation(int $idStudent, int $idInternship): ?Postulation;

    public function getStudentPostulation(int $idStudent);

    public function getPostulationsCreatedStudent(int $student_id): Collection;

    public function getPostulationsSendStudent(int $student_id): Collection;

    public function getStudentActualInterships(int $idStudent);

    public function getStudentFinishedInterships(int $idStudent);


    public function getStudentWaitInterships(int $idStudent);
}

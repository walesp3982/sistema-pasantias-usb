<?php

namespace App\Repositories\Interfaces;

use App\Models\Postulation;
use Illuminate\Database\Eloquent\Collection;

interface PostulationRepositoryInterface {
    public function create(array $data): Postulation;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function get(int $id): ?Postulation;

    public function getPostulationsIntershipAccepted(int $idIntership): Collection;

    public function getStudentIntershipPostulation(int $idStudent, int $idIntership): ?Postulation;

    public function getStudentPostulation(int $idStudent);
}

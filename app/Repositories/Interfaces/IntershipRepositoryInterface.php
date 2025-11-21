<?php

namespace App\Repositories\Interfaces;

use App\Models\Intership;
use Illuminate\Database\Eloquent\Collection;

interface IntershipRepositoryInterface {
    // Define los métodos que el repositorio debe implementar
    public function all(): Collection;
    public function find(int $id): ?Intership;
    public function create(array $data): Intership;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;

    public function enableByCareer(int $career_id): Collection;

    public function getStudentEnabledInterships(int $career_id, $studentIntershipsPostulations);
}

?>
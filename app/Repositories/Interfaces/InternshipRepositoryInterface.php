<?php

namespace App\Repositories\Interfaces;

use App\Models\Internship;
use Illuminate\Database\Eloquent\Collection;

interface InternshipRepositoryInterface
{
    // Define los métodos que el repositorio debe implementar
    public function all(): Collection;
    public function find(int $id): ?Internship;
    public function create(array $data): Internship;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;

    public function enableByCareer(int $career_id): Collection;

    public function getStudentEnabledInternships(int $career_id, $studentInternshipsPostulations);

    public function getInternshipsBefore(string $time, int $minutes): Collection;

    public function getInternshipsAfter(string $time, int $minutes): Collection;
}

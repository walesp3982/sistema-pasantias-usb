<?php

namespace App\Repositories\Interfaces;

use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface StudentRepositoryInterface {
    public function get(int $id): Student;

    public function update(int $id, array $data): bool;

    public function searchByName(string $name): Collection;

    public function findByName(string $firstName, string $lastName): bool;

    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function create(array $dataStudent): Student;
}

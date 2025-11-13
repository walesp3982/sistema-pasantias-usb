<?php

namespace App\Repositories\Interfaces;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function create(array $data): User;

    public function findById(int $id): ?User;

    public function findByEmail(string $email): ?User;

    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function update(int $id, array $data):bool;

    public function delete(int $id): bool;

    public function assignRole(int $id, RolesEnum $role):bool;

    public function desactivate(int $id): bool;

    public function activate(int $id): bool;
}

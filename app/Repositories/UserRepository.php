<?php

namespace App\Repositories;

use App\Enums\RolesEnum;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private readonly User $model
    ) {}

    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    public function findById(int $id): ?User
    {
        return $this->model->find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->latest()->paginate($perPage);
    }

    public function update(int $id, array $data): bool {
        $user = $this->model->findOrFail($id);
        return $user->update($data);
    }

    public function assignRole(int $id, RolesEnum $role): bool {
        $user = $this->model->findOrFail($id);
        $user->assignRole($role);
        return $user->hasRole($role);
    }
    public function delete(int $id): bool
    {
        $user = $this->model->findOrFail($id);
        return $user->delete();
    }

    public function desactivate(int $id): bool
    {
        $user = $this->model->findOrFail($id);
        return $user->setActive(false);
    }

    public function activate(int $id): bool
    {
        $user = $this->model->findOrFail($id);
        return $user->setActive(true);
    }

}

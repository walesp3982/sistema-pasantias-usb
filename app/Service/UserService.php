<?php

namespace App\Service;

use App\Enums\RolesEnum;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly UserRepositoryInterface $repository
    ) {}

    public function list(int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($perPage);
    }

    public function get(int $id): User
    {
        $user = $this->repository->findById($id);

        if (!$user) {
            throw new \Exception("Usuario no encontrado");
        }

        return $user;
    }

    public function create(array $data, RolesEnum $role): User
    {
        if($this->repository->findByEmail($data['email'])) {
            throw new \Exception("El email ya está registrado");
        }

        return DB::transaction(function () use ($data, $role) {
            $data['password'] = Hash::make($data['password']);

            $data['active'] = $data['active'] ?? true;

            $user = $this->repository->create($data);

            $this->repository->assignRole($user->id, $role);

            return $user;
        });
    }

    public function update(int $id, array $data): User
    {
        return DB::transaction(function () use ($id, $data) {
            $user = $this->get($id);

            if(isset($data['email']) && $data['email'] !== $user->email) {
                if($this->repository->findByEmail($data['email'])) {
                    throw new \Exception("El email ya está en uso");
                }
            }

            if(isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }

            $this->repository->update($id, $data);

            return $this->get($id);
        });
    }

    // Eliminado lógico
    public function desactive(int $id) {
        return DB::transaction((function () use ($id) {
            $this->desactive($id);
        }));
    }

    public function getCareer(int $id) {
        
        $user = $this->repository->findById($id);
        if(!$user->hasRole(RolesEnum::CAREER)) {
            throw new \Exception("No tiene el rol correcto");
        }
        $career = $user->careerDepartament->career;
        return $career;
    }
}

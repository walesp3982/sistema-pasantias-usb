<?php

namespace App\Service;

use App\Enums\RolesEnum;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Service\UserService;
use App\Models\User;
use App\Models\Student;
use App\Repositories\PhoneRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentService
{
    public function __construct(
        private readonly StudentRepositoryInterface $studentRepository,
        private readonly UserService $userService,
        private readonly PhoneService $phoneService
    ) {}

    public function create(array $data): Student
    {

        if ($this->studentRepository->findByName(
            $data['first_name'],
            $data['second_name']
        )) {
            throw new \Exception("El estudiante ya ha sido registrado");
        }

        return DB::transaction(function () use ($data) {
            $student = $this->studentRepository->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'identity_card' => $data['identity_card']
            ]);
            $phone = $this->phoneService->create(
                [
                    'country_id' => $data['country_id'],
                    'phone_number' => $data['phone_number']
                ]
            );
            $student->phone()->associate($phone);
            $student->save();
            return $student->load(['phone']);
        });
    }

    public function createUser(int $idStudent, string $email): User
    {
        return DB::transaction(function () use ($idStudent, $email) {
            // Obtenemos los datos del estudiante
            $student = $this->studentRepository->get($idStudent);

            $dataNewUser = [
                'email' => $email,
                'name' => $student->full_name,
                'password' => Str::password(
                    10,
                    true,
                    true,
                    false
                )
            ];
            // Creamos un nuevo usuario
            $user = $this->userService->create($dataNewUser, RolesEnum::STUDENT);

            $student->user()->associate($user);

            return $user;
        });
    }
}

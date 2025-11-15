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
        private readonly PhoneService $phoneService,
        private readonly LocationService $locationService
    ) {}

    public function create(array $data):Student
    {

        if ($this->studentRepository->findByName(
            $data['first_name'],
            $data['last_name']
        )) {
            throw new \Exception("El estudiante ya ha sido registrado");
        }

        return DB::transaction(function () use ($data) {
            $student = $this->studentRepository->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'identity_card' => $data['identity_card'],
                'semester' => $data['semester'],
                'ru' => $data['ru'],
                'shift_id' => $data['shift_id'],
                'career_id' => $data['career_id']
            ]);

            $newUser = $this->userService->create([
                'email' => $data['email'],
                'password' => $data['password'],
                'name' => $student->full_name
            ], RolesEnum::STUDENT);

            $student->user()->associate($newUser);
            $student->save();

            return $student;
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

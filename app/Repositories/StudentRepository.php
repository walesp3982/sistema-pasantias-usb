<?php

namespace App\Repositories;

use App\Models\Student;
use App\Models\Phone;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class StudentRepository implements StudentRepositoryInterface {
    public function __construct(private readonly Student $model) {

    }

    public function create(array $dataStudent): Student {
        return $this->model->create($dataStudent);
    }

    public function get(int $id): Student {
        return $this->model->find($id);
    }

    public function update(int $id, array $data):bool {
        return true;
    }

    public function searchByName(string $name): Collection
    {
        $students = $this->model->where('firstName', 'LIKE', '%'.$name.'%')
            ->orWhere('secondName', 'LIKE', '%'.$name.'%')
            ->get();
        return $students;
    }

    public function findById(string $id): Student|null {
        return new Student;
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator {
        return $this->model->latest()->paginate($perPage);
    }

    public function findByName(string $firstName, string $lastName):bool {
        $student = $this->model->where('first_name', "=", $firstName)
            ->where('last_name', "=", $lastName)->first();
        return is_null($student);
    }
}

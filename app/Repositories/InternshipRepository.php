<?php

namespace App\Repositories;

use App\Models\Internship;
use App\Repositories\Interfaces\InternshipRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Pest\Support\Arr;

class InternshipRepository implements InternshipRepositoryInterface
{
    public function __construct(
        private Internship $model
    ) {}

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find($id): ?Internship
    {
        return $this->model->find($id);
    }

    public function create(array $data): Internship
    {
        $internship = $this->model->create($data);
        return $internship;
    }

    public function update(int $id, array $data): bool
    {
        $internship = $this->model->findOrFail($id);
        return $internship->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->delete($id);
    }

    public function enableByCareer(int $career_id): Collection
    {
        return $this->model->where("career_id", $career_id)
            ->get();
    }
    public function getStudentEnabledInternships(int $career_id, $studentInternshipsPostulations)
    {
        return $this->model
            ->where("career_id", $career_id)
            ->whereNotIn("id", $studentInternshipsPostulations)
            ->get();
    }


    public function getInternshipsBefore(string $time, int $minutes): Collection
    {
         $hours = floor($minutes / 60);
        $mins = $minutes % 60;
        $interval = sprintf('%02d:%02d:00', $hours, $mins);
        $query = $this->model
            ->whereRaw(
                "exit_time <= SUBTIME(?, ?)",
                [$time, $interval]
            );
        // dd([
        //     'sql' => $query->toRawSql(),
        // ]);
        return $query->get();
    }

    public function getInternshipsAfter(string $time, int $minutes): Collection
    {
        $hours = floor($minutes / 60);
        $mins = $minutes % 60;
        $interval = sprintf('%02d:%02d:00', $hours, $mins);

        $query = $this->model
            ->whereRaw(
                "entry_time >= ADDTIME(?, ?)",
                [(string)$time, $interval]
            );

        // dd([
        //     'sql' => $query->toSql(),
        //     'bindings' => $query->getBindings(),
        // ]);

        return $query->get();
    }
}

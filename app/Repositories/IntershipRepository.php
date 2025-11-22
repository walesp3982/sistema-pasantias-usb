<?php

namespace App\Repositories;

use App\Models\Intership;
use App\Repositories\Interfaces\IntershipRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Pest\Support\Arr;

class IntershipRepository implements IntershipRepositoryInterface
{
    public function __construct(
        private Intership $model
    ) {}

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find($id): ?Intership
    {
        return $this->model->find($id);
    }

    public function create(array $data): Intership
    {
        $intership = $this->model->create($data);
        return $intership;
    }

    public function update(int $id, array $data): bool
    {
        $intership = $this->model->findOrFail($id);
        return $intership->update($data);
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
    public function getStudentEnabledInterships(int $career_id, $studentIntershipsPostulations)
    {
        return $this->model
            ->where("career_id", $career_id)
            ->whereNotIn("id", $studentIntershipsPostulations)
            ->get();
    }


    public function getIntershipsBefore(string $time, int $minutes): Collection
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

    public function getIntershipsAfter(string $time, int $minutes): Collection
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

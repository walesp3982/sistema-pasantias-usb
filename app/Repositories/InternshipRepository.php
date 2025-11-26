<?php

namespace App\Repositories;

use App\Enums\StatePostulationEnum;
use App\Enums\StatusInternshipEnum;
use App\Models\Internship;
use App\Repositories\Interfaces\InternshipRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Pest\Support\Arr;

class InternshipRepository implements InternshipRepositoryInterface
{
    public function __construct(
        private Internship $model
    ) {
    }

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
            ->wait()
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
            ->wait()
            ->whereRaw(
                "entry_time >= ADDTIME(?, ?)",
                [(string) $time, $interval]
            );

        // dd([
        //     'sql' => $query->toSql(),
        //     'bindings' => $query->getBindings(),
        // ]);

        return $query->get();
    }
    public function getCareerDetail(int $career_id): Collection
    {
        return Internship::where("career_id", $career_id)
            ->withCount(relations:
                [
                    "postulations as accept_count" => fn($q) => $q->where('status', StatePostulationEnum::ACCEPT),
                    "postulations as verify_count" => fn($q) => $q->where("status", StatePostulationEnum::VERIFY),
                    "postulations as reject_count" => fn($q) => $q->where("status", StatePostulationEnum::REJECT),
                    "postulations as send_count" => fn($q) => $q->where("status", StatePostulationEnum::SEND),
                ])
            ->latest()
            ->limit(30)
            ->get();
    }

    public function getCareerDetailWait(int $career_id): Collection
    {
        return Internship::where("career_id", $career_id)
            ->wait()
            ->withCount(relations:
                [
                    "postulations as accept_count" => fn($q) => $q->where('status', StatePostulationEnum::ACCEPT),
                    "postulations as verify_count" => fn($q) => $q->where("status", StatePostulationEnum::VERIFY),
                    "postulations as reject_count" => fn($q) => $q->where("status", StatePostulationEnum::REJECT),
                    "postulations as send_count" => fn($q) => $q->where("status", StatePostulationEnum::SEND),
                ])
            ->latest()
            ->limit(30)
            ->get();
    }

    public function getCareerDetailCurrent(int $career_id): Collection
    {
        return Internship::where("career_id", $career_id)
            ->current()
            ->withCount(relations:
                [
                    "postulations as accept_count" => fn($q) => $q->where('status', StatePostulationEnum::ACCEPT),
                    "postulations as verify_count" => fn($q) => $q->where("status", StatePostulationEnum::VERIFY),
                    "postulations as reject_count" => fn($q) => $q->where("status", StatePostulationEnum::REJECT),
                    "postulations as send_count" => fn($q) => $q->where("status", StatePostulationEnum::SEND),
                ])
            ->latest()
            ->limit(30)
            ->get();
    }

    public function getCareerDetailFinished(int $career_id): Collection
    {
        return Internship::where("career_id", $career_id)
            ->finished()
            ->withCount(relations:
                [
                    "postulations as accept_count" => fn($q) => $q->where('status', StatePostulationEnum::ACCEPT),
                    "postulations as verify_count" => fn($q) => $q->where("status", StatePostulationEnum::VERIFY),
                    "postulations as reject_count" => fn($q) => $q->where("status", StatePostulationEnum::REJECT),
                    "postulations as send_count" => fn($q) => $q->where("status", StatePostulationEnum::SEND),
                ])
            ->latest()
            ->limit(30)
            ->get();
    }

    public function getEagerLoading(int $id): ?Internship
    {
        return Internship::with('career', 'location.zone.municipality')->find($id);
    }
}

<?php

namespace App\Repositories;

use App\Enums\StatePostulationEnum;
use App\Models\Postulation;
use App\Repositories\Interfaces\PostulationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostulationRepository implements PostulationRepositoryInterface
{
    public function __construct(
        private readonly Postulation $model
    ) {}
    public function create(array $data): Postulation
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $postulation = $this->model->findOrFail($id);

        return $postulation->update($data);
    }

    public function delete(int $id): bool
    {
        $postulation = $this->model->findOrFail($id);
        return $postulation->delete();
    }

    public function get(int $id): ?Postulation
    {
        return $this->model->find($id);
    }

    public function getByIntershipAccepted(int $idIntership): Collection
    {
        return $this->model
            ->where('intership_id', $idIntership)
            ->where("status", StatePostulationEnum::ACCEPT)
            ->all();
    }
}

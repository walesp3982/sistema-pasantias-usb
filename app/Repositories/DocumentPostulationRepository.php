<?php

namespace App\Repositories;

use App\Enums\DocPostulationEnum;
use App\Models\DocumentPostulation;
use App\Repositories\Interfaces\DocumentPostulationRepositoryInterface;

class DocumentPostulationRepository implements DocumentPostulationRepositoryInterface
{
    public function __construct(
        private DocumentPostulation $model
    ) {}

    public function get(int $id): ?DocumentPostulation
    {
        return $this->model->find($id);
    }

    public function delete(int $id ): bool {
        $doc = $this->model->findOrFail($id);

        return $doc->update();
    }

    public function find(int $id_postulation, DocPostulationEnum $enum): ?DocumentPostulation {
        return $this->model->where("postulation_id", $id_postulation)
            ->where("type_document_postulation_id", $enum)
            ->first();
    }

    public function create(array $data): DocumentPostulation {
        return $this->model->create($data);
    }
}

<?php

namespace App\Repositories\Interfaces;

use App\Enums\DocPostulationEnum;
use App\Models\DocumentPostulation;

interface DocumentPostulationRepositoryInterface {
    public function get(int $id): ?DocumentPostulation;

    public function delete(int $id): bool;

    public function find(int $id_postulation, DocPostulationEnum $enum): ?DocumentPostulation;

    public function create(array $data): DocumentPostulation;
}
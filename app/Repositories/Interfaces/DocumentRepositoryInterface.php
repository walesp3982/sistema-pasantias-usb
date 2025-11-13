<?php

namespace App\Repositories\Interfaces;

use App\Models\Files\Document;

interface DocumentRepositoryInterface {
    public function create(array $data): Document;
    public function get(int $id): ?Document;

    public function delete(int $id): bool;

}

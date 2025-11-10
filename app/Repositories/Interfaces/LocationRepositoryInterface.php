<?php

namespace App\Repositories\Interfaces;

use App\Models\Information\Location;

interface LocationRepositoryInterface {
    public function get(int $id): ?Location;

    public function create(array $data): Location;

    public function delete(int $id): bool;

    public function update(int $id, array $data): bool;
}

?>

<?php

namespace App\Repositories\Interfaces;

use App\Models\Files\Picture;

interface PictureRepositoryInterface {
    public function create(array $data): Picture;

    public function get(int $id): ?Picture;

    public function delete(int $id): bool;

    public function update(int $id, array $data): bool;

}

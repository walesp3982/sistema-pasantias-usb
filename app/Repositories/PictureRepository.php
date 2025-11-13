<?php

namespace App\Repositories;

use App\Models\Files\Picture;
use App\Repositories\Interfaces\PictureRepositoryInterface;

class PictureRepository implements PictureRepositoryInterface{
    public function __construct(
        private readonly Picture $model
    ) {

    }
    public function create(array $data): Picture {
        $picture = $this->model->create($data) ;
        return $picture;
    }

    public function get(int $id): ?Picture {
        $picture = $this->model->find($id);
        return $picture;
    }

    public function delete(int $id): bool {
        $picture = $this->model->find($id);
        return $picture->delete();
    }

    public function update(int $id, array $data): bool {
        $picture = $this->model->find($id);
        return $picture->update($data);
    }
}

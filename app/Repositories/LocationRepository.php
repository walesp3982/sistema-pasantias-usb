<?php

namespace App\Repositories;

use App\Models\Information\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;

class LocationRepository implements LocationRepositoryInterface {
    public function __construct(
        private Location $model
    ){ }
    public function get(int $id): ?Location {
        return $this->model->find($id);
    }

    public function create(array $data): Location {
        return $this->model->create($data);
    }

    public function delete(int $id):bool {
        $location = $this->model->find($id);
        return $location->delete();
    }

    public function update(int $id, array $data):bool {
        $location = $this->model->find($id);
        return $location->update($data);
    }
}

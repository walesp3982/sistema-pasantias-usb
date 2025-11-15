<?php

namespace App\Repositories;

use App\Models\CompanyLocation;
use App\Repositories\Interfaces\CompanyLocationRepositoryInterface;

class CompanyLocationRepository implements CompanyLocationRepositoryInterface
{
    public function __construct(
        private CompanyLocation $model
    ) {}

    public function get(int $id): ?CompanyLocation {
        return $this->model->find($id);
    }

    public function update(int $id, array $data): bool {
        $companyLocation = $this->model->findOrFail($id);
        return $companyLocation->update($data);
    }

    public function create(array $data): CompanyLocation {
        return $this->model->create($data);
    }

    public function delete(int $id): bool {
        $companyLocation = $this->model->findOrFail($id);
        return $companyLocation->delete();
    }
}

<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interfaces\CompanyRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyRepository implements CompanyRepositoryInterface {
    public function __construct(
        private Company $model
    ) {}
    public function get(int $id): ?Company {
        $company = $this->model->find($id);
        return $company;
    }
    public function create(array $data): Company {
        $company = $this->model->create($data);
        return $company;
    }

    public function remove(int $id): bool {
        $company = $this->model->findOrFail($id);
        return $company->delete();
    }

    public function update(int $id, array $data): bool {
        $company = $this->model->findOrFail($id);
        return $company->update($data);
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->latest()->paginate($perPage);
    }



}

<?php

namespace App\Repositories\Interfaces;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

interface CompanyRepositoryInterface {
    public function get(int $id): ?Company;

    public function remove(int $id): bool;

    public function update(int $id, array $data): bool;

    public function create(array $data): Company;

    public function paginate(int $perPage = 15): LengthAwarePaginator;
}

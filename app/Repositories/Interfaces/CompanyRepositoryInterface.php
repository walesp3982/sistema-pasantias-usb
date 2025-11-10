<?php

namespace App\Repositories\Interfaces;

use App\Models\Company;

interface CompanyRepositoryInterface {
    public function get(int $id): ?Company;

    public function remove(int $id): bool;

    public function update(int $id, array $data): bool;

    public function create(array $data): Company;
}

<?php 

namespace App\Repositories\Interfaces;

use App\Models\CompanyLocation;

interface CompanyLocationRepositoryInterface {
    public function create(array $data): CompanyLocation;

    public function update(int $id, array $data): bool;

    public function get(int $id): ?CompanyLocation;

    public function delete(int $id): bool;
}
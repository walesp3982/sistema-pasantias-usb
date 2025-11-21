<?php 

namespace App\Repositories\Interfaces;

use App\Enums\StatusIntershipEnum;
use App\Models\Intership;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface IntershipRepostoryInterface {
    public function all(): Collection;
    public function get(int $id): ?Intership;

    public function pagination(int $perPage, StatusIntershipEnum $enum): LengthAwarePaginator; 

    public function find($id): ?Intership;

    public function create(array $data): Intership;

    public function update();

    public function delete(int $id): bool;
}
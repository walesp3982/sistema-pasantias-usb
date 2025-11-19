<?php 

namespace App\Repositories\Interfaces;

use App\Enums\StatusIntershipEnum;
use App\Models\Intership;
use Illuminate\Pagination\LengthAwarePaginator;

interface IntershipRepostoryInterface {
    public function get(int $id): ?Intership;

    public function pagination(int $perPage, StatusIntershipEnum $enum): LengthAwarePaginator; 
}
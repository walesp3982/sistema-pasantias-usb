<?php

namespace App\Repositories\Interfaces;

use App\Models\Information\Phone;
use Illuminate\Database\Eloquent\Collection;

interface PhoneRepositoryInterface {
    public function create($data): Phone;

    public function get(int $id): ?Phone;

    public function findByCountry(int $country_id): Collection;

    public function search(string $code): Collection;

    public function find(string $phone_number, int $country_id): bool;
}

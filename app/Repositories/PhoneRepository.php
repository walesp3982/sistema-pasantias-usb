<?php

namespace App\Repositories;

use App\Models\Information\Phone;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\PhoneRepositoryInterface;

class PhoneRepository implements PhoneRepositoryInterface{
    public function __construct(private Phone $model) {

    }
    public function create($data): Phone {
        return $this->model->create($data);
    }

    public function get(int $id): ?Phone {
        $phone = $this->model->find($id);
        return $phone;
    }

    public function findByCountry(int $idCountry): Collection
    {
        $phones = $this->model
        ->where('country_id', "=", $idCountry)->all();
        return $phones;
    }

    public function search(string $code): Collection {
        $phones = $this->model->where('phone_number', 'LIKE', "%".$code."%")
            ->get();

        return $phones;
    }

    public function find(string $phone_number, int $country_id): bool {
        $phone = $this->model->where('code_phone', "=", $phone_number)
            ->where("country_id", "=", $country_id)->first();
        return !is_null($phone);
    }
}

<?php

namespace App\Service;

use App\Models\Information\Phone;
use App\Repositories\Interfaces\PhoneRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PhoneService
{

    public function __construct(
        private readonly PhoneRepositoryInterface $phoneRepository
    ) {}
    public function create(array $data): Phone
    {
        if ($this->phoneRepository
            ->find(
                $data['phone_number'],
                $data['country_id']
            )
        ) {
            throw new \Exception('Numero ya existente! Ingrese otro número');
        }
        return DB::transaction(
            function () use ($data) {
                $phone = $this->phoneRepository->create([
                    "code_phone" => $data['code_phone'],
                    'phone_number' => $data['phone_number'],
                    'notifications' => $data['notifications']
                ]);

                return $phone;
            }
        );
    }
}

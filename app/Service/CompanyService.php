<?php

namespace App\Service;

use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\DB;

class CompanyService
{
    public function __construct(
        private CompanyRepository $repository,
        private LocationService $locationService,
    ) {}
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $company = $this->repository->create([
                "name" => $data["name"],
                "email" => $data["email"],
                "sector_id" => $data["sector_id"],
                "name_manager" => $data["name_manager"]
            ]);

            $company->locations()->create([
                'street' => $data['street'],
                'zone_id' => $data['zone_id'],
                'reference' => $data['reference'],
                'number_door' => $data['number_door'],
                'phone_number' => $data["phone_number"]
            ]);
        });
    }
}

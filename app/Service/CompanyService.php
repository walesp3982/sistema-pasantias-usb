<?php

namespace App\Service;

use App\Repositories\CompanyLocationRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\PhoneRepository;
use Illuminate\Support\Facades\DB;

class CompanyService
{
    public function __construct(
        private CompanyRepository $repository,
        private LocationService $locationService,
        private PhoneService $phoneService,
        private CompanyLocationRepository $companyLocationRepository
    ) {}
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $company = $this->repository->create([
                "name" => $data["name"],
                "email" => $data["email"],
                "sector_id" => $data["sector_id"]
            ]);

            $location = $this->locationService->create([
                'street' => $data['street'],
                'zone_id' => $data['zone_id'],
                'reference' => $data['reference'],
                'number_door' => $data['number_door']
            ]);

            $phone = $this->phoneService->create([
                'number' => $data['phone_number'],
            ]);

            $locationcompany = $this->companyLocationRepository->create([
                'location_id' => $location->id,
                'company_id' => $company->id,
                'name_administrador' => $data['name_administrador'],
                'principal' => true,
            ]);

            $locationcompany->phone()->save($phone);
        });
    }
}

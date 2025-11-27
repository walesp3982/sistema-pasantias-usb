<?php

namespace App\Service;

use App\Repositories\CompanyRepository;
use App\Repositories\InternshipRepository;
use Illuminate\Support\Facades\DB;

class CompanyService
{
    public function __construct(
        private CompanyRepository $repository,
        private LocationService $locationService,
        private InternshipRepository $internshipRepository,
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

    public function find(int $id) {
        $company = $this->repository->get($id);

        if(is_null($company)) {
            throw new \Exception("No se encontro la company con id=$id");
        }

        return $company;

    }

    public function getInternshipFinished(int $id) {
        $company = $this->repository->get($id);

        if(is_null($company)) {
            throw new \Exception("No existe la compañia");
        }

        $internshipFinished = $this->internshipRepository
            ->getCompanyDetailFinished($company->id);

        return $internshipFinished;
    }

    public function getInternshipCurrent(int $id) {
        $company = $this->repository->get($id);

        if(is_null($company)) {
            throw new \Exception("No existe la compañia");
        }

        $internshipCurrent = $this->internshipRepository
            ->getCompanyDetailFinished($company->id);
        
        return $internshipCurrent;
    }

    public function getInternshipWait(int $id) {
        $company = $this->repository->get($id);

        if(is_null($company)) {
            throw new \Exception("No existe la compañia");
        }

        $internshipWait = $this->internshipRepository
        ->getCompanyDetailWait($company->id);

        return $internshipWait;
    }
}

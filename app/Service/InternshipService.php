<?php

namespace App\Service;

use App\Enums\StatusInternshipEnum;
use App\Repositories\Interfaces\PostulationRepositoryInterface;
use App\Repositories\InternshipRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class InternshipService
{
    public function __construct(
        private InternshipRepository $repository,
        private PostulationRepositoryInterface $postulationRepository
    ) {}

    public function create(array $data) {
        return DB::transaction(
            function () use ($data){
                $company = $this->repository->create([
                    "company_id" => $data["company_id"],
                    "career_id" => $data["career_id"],
                    "start_date" => $data["start_date"],
                    "end_date" => $data["end_date"],
                    "postulation_limit_date" => $data["postulation_limit_date"],
                    "entry_time" => $data["entry_time"],
                    "exit_time" => $data["exit_time"],
                    "vacant" => $data["vacant"],
                    "location_id" => $data["location_id"],
                    "status" => StatusInternshipEnum::PENDING,
                ]);

                return $company;
            }
        );
    }

    public function getByCareerDetail(int $career_id): Collection {
        $interships = $this->repository->getCareerDetail($career_id);

        return $interships;
    }

    public function getCareerDetailWait(int $career_id): Collection {
        $interships = $this->repository->getCareerDetailWait($career_id);
        return $interships;
    }

    public function getCareerDetailCurrent(int $career_id): Collection{
        $interships = $this->repository->getCareerDetailCurrent($career_id);
        return $interships;
    }

    public function getCareerDetailFinished(int $career_id): Collection{
        $interships = $this->repository->getCareerDetailFinished($career_id);
        return $interships;
    }

    public function find(int $id) {
        return $this->repository->find($id);
    }

    public function getPostulationAccept(int $internship_id) {
        return $this->postulationRepository->getPostulationAcceptByIntership($internship_id);
    }

    public function getPostulationSend(int $internship_id) { 
        return $this->postulationRepository->getPostulationSendByIntership($internship_id);
        
    }
}

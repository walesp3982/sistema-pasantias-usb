<?php

namespace App\Service;

use App\Enums\StatusIntershipEnum;
use App\Repositories\IntershipRepository;
use Illuminate\Support\Facades\DB;

class IntershipService
{
    public function __construct(
        private IntershipRepository $repository
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
                    "status" => StatusIntershipEnum::PENDING,
                ]);

                return $company;
            }
        );
    }
}

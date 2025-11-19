<?php

namespace App\Service;

use App\Models\Information\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LocationService {
    public function __construct(
        private LocationRepositoryInterface $repository
    ){}

    public function create(array $data):Location {
        return DB::transaction(function() use ($data) {
            $location = $this->repository->create([
                'street' => $data['street'],
                'zone_id' => $data['zone_id'],
                'reference' => $data['reference'],
                'number_door' => $data['number_door']
            ]);

            return $location;
        });
    }
}

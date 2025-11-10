<?php

namespace App\Repositories\Interfaces;

use App\Models\Postulation;
use Illuminate\Database\Eloquent\Collection;

interface PostulationRepositoryInterface {
    public function create(array $data): Postulation;
    public function update(array $data): Postulation;
    public function delete(array $data): Postulation;
    public function get(int $id): ?Postulation;


}

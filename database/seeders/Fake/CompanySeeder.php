<?php

namespace Database\Seeders\Fake;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\Information\Location;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::factory()
            ->has(CompanyLocation::factory()
                ->withLocation()
                ->principal()
                ->count(1)
            )
            ->count(10)
            ->create();
    }
}

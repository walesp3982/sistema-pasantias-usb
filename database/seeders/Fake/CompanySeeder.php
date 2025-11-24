<?php

namespace Database\Seeders\Fake;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Information\Location;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()
            ->withLocation(3)
            ->withInternships(5)
            ->create();

        $companies = Company::factory()
            ->withLocation(4)
            ->count(20)
            ->create();
    }
}

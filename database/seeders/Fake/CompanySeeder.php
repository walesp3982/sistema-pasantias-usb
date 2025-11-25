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
            ->withInternshipsWait(2)
            ->withInternshipsCurrent(2)
            ->withInternshipsFinished(2)
            ->create();

        $companies = Company::factory()
            ->withLocation(4)
            ->withInternshipsCurrent(2)
            ->withInternshipsFinished(2)
            ->withInternshipsWait(3)
            ->count(10)
            ->create();
    }
}

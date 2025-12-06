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
            ->withInternshipsWait(1)
            ->withInternshipsCurrent(2)
            ->withInternshipsFinished(1)
            ->create();

        Company::factory()
            ->withLocation(4)
            ->withInternshipsCurrent(1)
            ->withInternshipsFinished(1)
            ->withInternshipsWait(1)
            ->count(2)
            ->create();
    }
}

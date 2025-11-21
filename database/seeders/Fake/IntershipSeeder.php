<?php

namespace Database\Seeders\Fake;

use App\Enums\CareerEnum;
use App\Enums\ShiftEnum;
use App\Models\Information\Shift;
use App\Models\Intership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Intership::factory()
            ->count(4)
            ->stateHours(ShiftEnum::AFTERNOON)
            ->stateCareer(CareerEnum::SISTEMAS)
            ->create();


        Intership::factory()
            ->count(3)
            ->stateHours(ShiftEnum::MORNING)
            ->stateCareer(CareerEnum::SISTEMAS)
            ->create();

        Intership::factory()
            ->count(5)
            ->stateHours(ShiftEnum::NIGHT)
            ->stateCareer(CareerEnum::SISTEMAS)
            ->create();
    }
}

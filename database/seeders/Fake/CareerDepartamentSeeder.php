<?php

namespace Database\Seeders\Fake;

use App\Enums\CareerEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerDepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(CareerEnum::cases() as $career) {
            User::factory()
                ->asCareerDepartament($career)
                ->state(["email" => $career->email()])
                ->create();
        }
    }
}

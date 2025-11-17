<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\Information\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyLocation>
 */
class CompanyLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name_admin = $this->faker->firstName()
            ." ".$this->faker->lastName()
            ." ".$this->faker->lastName();
        return [
            //
            "name_administrador" =>  $name_admin,
            "active" => true,
            "principal" => false,
            "company_id" => Company::factory(),
        ];
    }

    public function principal() {
        return $this->state(function (array $attributes) {
            return [
                'principal' => true
            ];
        });
    }

    public function withLocation(): static {
        return $this->afterCreating(function (CompanyLocation $company) {
            $company->location()->save(Location::factory()->make());
        });
    }
}

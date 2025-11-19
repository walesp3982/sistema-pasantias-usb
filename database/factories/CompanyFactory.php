<?php

namespace Database\Factories;

use App\Faker\CompanyProvider;
use App\Models\Company;
use App\Models\Information\Location;
use App\Models\Sector;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new CompanyProvider($this->faker));
        $lastName = $this->faker->lastName();
        $suffix = $this->faker->suffix();
        $preffix = $this->faker->prefix();
        $name = strtolower($this->faker->firstName().".".$this->faker->lastName());
        $email = strtolower($name."@".$lastName.".com");
        $name_manager = $this->faker->name();
        return [
            //
            "name" => "$preffix $lastName $suffix",
            "email" => "$email",
            "sector_id" => Sector::inRandomOrder()->first()->id,
            'name_manager' => $name_manager,
        ];
    }

    public function withLocation(int $number = 1): static {
        return $this->afterCreating(function (Company $company) use ($number) {
            if($number < 1) {
                throw new \Exception("Numero menor a 1. Abortando...");
            }
            for($i = 1; $i <= $number; $i++) {
                $company->locations()->save(Location::factory()->make());
            }
        });
    }
}

<?php

namespace Database\Factories;

use App\Faker\CompanyProvider;
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
        return [
            //
            "name" => "$preffix $lastName $suffix",
            "email" => "$email",
            "sector_id" => Sector::inRandomOrder()->first()->id,
        ];
    }
}

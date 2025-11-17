<?php

namespace Database\Factories;

use App\Models\Geography\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Information\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "zone_id" => Zone::inRandomOrder()->first()->id,
            "street" => "Av. ".$this->faker->streetName(),
            "locatable_type" => null,
            "locatable_id" => null,
            "reference" => "",
            "number_door" => $this->faker->numberBetween(1000,2000)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\CareerEnum;
use App\Enums\RolesEnum;
use App\Enums\ShiftEnum;
use App\Models\Information\Career;
use App\Models\Information\Shift;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function configure(): static
    {
        return $this->afterMaking(function ($model) {
            // !! Esto no sirve (arreglarlo para cuando exista tiempo)
            $this->faker->seed(123);
        })->afterCreating(function ($student) {
            $student->user->update([
                'name' => "{$student->first_name} {$student->last_name}"
            ]);
            $student->user->assignRole(RolesEnum::STUDENT);
        });
    }
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName() . " " . $this->faker->lastName(),
            'ru' => $this->faker->unique()->numberBetween(60000, 70000),
            'career_id' => Career::inRandomOrder()->first()->id,
            'shift_id' => Shift::inRandomOrder()->first()->id,
            'semester' => $this->faker->numberBetween(5, 10),
            'user_id' => User::factory(),

        ];
    }

    public function career(CareerEnum $career): Factory
    {
        return $this->state(function (array $attributes) use ($career) {
            return [
                'career_id' => $career->value
            ];
        });
    }

    public function shift(ShiftEnum $shift)
    {
        return $this->state(function (array $attributes) use ($shift) {
            return [
                'shift_id' => $shift->value
            ];
        });
    }
}

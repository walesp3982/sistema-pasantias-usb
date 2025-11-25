<?php

namespace Database\Factories;

use App\Enums\CareerEnum;
use App\Enums\RolesEnum;
use App\Enums\ShiftEnum;
use App\Models\Information\Career;
use App\Models\Information\Location;
use App\Models\Information\Shift;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{

    public function configure(): static
    {
        return $this->afterMaking(function ($model) {
            // !! Esto no sirve (arreglarlo para cuando exista tiempo)
            // $this->faker->seed(seed: 123);
        })->afterCreating(function ($student) {
            // $student->user->update([
            //     'name' => "{$student->first_name} {$student->last_name}"
            // ]);
            $student->user->assignRole(RolesEnum::STUDENT);
        });
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = $this->faker->firstName();
        $lastName = $this->faker->lastName() . " " . $this->faker->lastName();
        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'ru' => $this->faker->unique()->numberBetween(60000, 70000),
            'career_id' => Career::inRandomOrder()->first()->id,
            'shift_id' => Shift::inRandomOrder()->first()->id,
            'semester' => $this->faker->numberBetween(5, 10),
            'user_id' => fn(array $attributes) => $this->user($attributes),
        ];
    }

    public function getFirstWord(string $sentence): string
    {
        $word = strtok($sentence, ' ');
        $word = strtolower($word);

        $word = strtr($word, [
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'Á' => 'a',
            'É' => 'e',
            'Í' => 'i',
            'Ó' => 'o',
            'Ú' => 'u',
            'ñ' => 'n',
            'Ñ' => 'n'
        ]);

        return $word;
    }
    public function user(array $attributes)
    {
        $first_name = $this->getFirstWord($attributes['first_name']);
        $last_name = $this->getFirstWord($attributes['last_name']);
        $email = \sprintf(
            '%s.%s.%s@gmail.com',
            $first_name,
            $last_name,
            $attributes["ru"]
        );
        $nameUser = $attributes['first_name'] . " " . $attributes['last_name'];
        return User::factory()->create([
            "email" => $email,
            "name" => $nameUser,
        ]);
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

    public function withLocation(): static
    {
        return $this->afterCreating(function (Student $student) {
            $student->location()->save(Location::factory()->make());
        });
    }
}

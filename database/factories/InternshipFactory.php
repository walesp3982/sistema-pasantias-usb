<?php

namespace Database\Factories;

use App\Enums\CareerEnum;
use App\Enums\ShiftEnum;
use App\Enums\StatusInternshipEnum;
use App\Models\Company;
use App\Models\Information\Career;
use App\Models\Information\Location;
use App\Models\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Internship>
 */
class InternshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    /**
     * @return \Illuminate\Support\Carbon
     */
    public function setEntryTime(ShiftEnum $enum)
    {
        $hour = match ($enum) {
            ShiftEnum::MORNING => $this->faker->numberBetween(7, 8),
            ShiftEnum::AFTERNOON => $this->faker->numberBetween(14, 15),
            ShiftEnum::NIGHT => $this->faker->numberBetween(18, 19)
        };

        $minutes = 15 * $this->faker->numberBetween(0, 3);
        $entry_time = Carbon::createFromTime($hour, $minutes, 0);
        return $entry_time;
    }

    public function setExitTime(Carbon $entry_time)
    {
        return $entry_time->addHours(4);
    }

    public function definition(): array
    {
        $company = Company::inRandomOrder()->first();
        $location = Location::where('locatable_id', $company->id)
            ->where("locatable_type", Company::class)
            ->inRandomOrder()->first();
        $postulation_limit_data = now()->addDays(
            $this->faker->numberBetween(10, 40)
        );

        $start_date = $postulation_limit_data->copy()->addWeeks(
            $this->faker->numberBetween(2, 5)
        );

        $end_date = $start_date->copy()->addMonths(
            $this->faker->numberBetween(12, 24)
        );

        /** @var \Illuminate\Support\Carbon $entry_time */
        $entry_time = $this->setEntryTime($this->faker->randomElement(ShiftEnum::cases()));
        $exit_time = $entry_time->copy()->addHours(4);

        return [
            //
            'company_id' => $company->id,
            'location_id' => $location?->id,
            'entry_time' => $entry_time,
            'exit_time' => $exit_time,
            'postulation_limit_date' => $postulation_limit_data,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'vacant' => $this->faker->numberBetween(4, 10),
            'status' => StatusInternshipEnum::PENDING,
            'career_id' => Career::inRandomOrder()->first()->id,
        ];
    }

    public function finishedIntership() {
        return $this->state(function ($array) {
            $end_date = now()->subDays($this->faker->numberBetween(10,30));
            $start_date = $end_date->copy()->subMonths($this->faker->numberBetween(12,16));
            $postulation_data = $start_date->copy()->subWeeks($this->faker->numberBetween(1,2));
            return [
                'end_date' => $end_date,
                'start_date' => $start_date,
                'postulation_limit_date' => $postulation_data,
            ];
        })->afterCreating( function ($model) {
            $vacant = $model->vacant;
            $career_id = $model->career_id;
            
        });
    }

    public function currentIntership() {
        return $this->state(function ($array) {
            $period = $this->faker->numberBetween(12,24);
            $monthsafter = $period - $this->faker->numberBetween(4,8);
            
            $start_date = now()->subMonths($monthsafter);
            $postulation_date = $start_date->copy()->subWeeks($this->faker->numberBetween(1,2));
            $end_date = $start_date->copy()->addMonths($period);
        });
    }

    public function stateHours(ShiftEnum $enum)
    {
        return $this->state(function ($array) use ($enum) {
            $hour = match ($enum) {
                ShiftEnum::MORNING => $this->faker->numberBetween(7, 8),
                ShiftEnum::AFTERNOON => $this->faker->numberBetween(14, 15),
                ShiftEnum::NIGHT => $this->faker->numberBetween(18, 19)
            };

            $minutes = 15 * $this->faker->numberBetween(0, 3);
            $entry_time = Carbon::createFromTime($hour, $minutes, 0);
            return [
                "entry_time" => $entry_time,
                "exit_time" => $entry_time->copy()->addHours(4)
            ];
        });
    }

    public function stateCareer(CareerEnum $enum)
    {
        return $this->state(function ($array) use ($enum) {
            return [
                "career_id" => $enum->value
            ];
        });
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Internship $internship) {
            // Si ya tiene company_id asignado (por relación), buscar location de esa company
            if ($internship->company_id) {
                $location = Location::where('locatable_id', $internship->company_id)
                    ->where("locatable_type", Company::class)
                    ->inRandomOrder()
                    ->first();

                $internship->location_id = $location?->id;
            }
        });
    }
}

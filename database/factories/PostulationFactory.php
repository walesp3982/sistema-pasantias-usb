<?php

namespace Database\Factories;

use App\Enums\StatePostulationEnum;
use App\Models\Company;
use App\Models\Internship;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postulation>
 */
class PostulationFactory extends Factory
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
            "student_id" => Student::factory(),
            "intership_id" => Internship::factory(),
            "status" => StatePostulationEnum::CREATED,
        ];
    }

    public function send() {
        return $this->state(function ($array) {
            return [
                "status" => StatePostulationEnum::SEND,
            ];
        });
    }

    public function verify() {
        return $this->state(function ($array) {
            return [
                "status" => StatePostulationEnum::VERIFY,
            ];
        });
    }

    public function accept() {
        return $this->state(function ($array) {
            return [
                "status" => StatePostulationEnum::ACCEPT,
            ];
        });
    }

    public function reject() {
        return $this->state(function ($array) {
            return [
                "status" => StatePostulationEnum::REJECT,
            ];
        });
    }
}

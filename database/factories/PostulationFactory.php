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
            "internship_id" => null,
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

    public function setCareer($career_id) {
        return $this->afterCreating(function ($model, $p1) use ($career_id) {
            $student = $model->student;
            $student->update(['career_id' => $career_id]);
        });
    }
}

<?php

namespace Database\Seeders\Fake;

use App\Enums\CareerEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creamos 20 estudiante de ingenieria de sistemas
        $studentsSystem = Student::factory()
            ->count(20)
            ->career(CareerEnum::SISTEMAS)
            ->create();

        // Creamos 10 estudiantes para la carrera de derecho
        $studentDerecho = Student::factory()
            ->count(10)
            ->career(CareerEnum::DERECHO)
            ->create();
        
        // Creamos 15 estudiantes de psicomotricidad
        $studentPsicomotricidad = Student::factory()
            ->count(15)
            ->career(CareerEnum::PSICOMOTRICIDAD)
            ->create();
    }
}

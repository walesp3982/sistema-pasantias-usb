<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $careers = [
            'Ciencias de la educación',
            'Ingenieria de Sistemas',
            'Contaduría Pública',
            'Derecho',
            'Psicomotricidad, Salud, Education y Deportes',
            'Técnico Superior en Educación Parvularia',
            'Técnica Superior en Educación Especial Inclusiva',
            'Técnico Superior en Pedagogía al Adulto Mayor',
            'Ingeniería Comercial y Desarrollo de Negocios',
            'Gastronomia y Gestión de Restaurantes'
        ];

        foreach ($careers as $career) {
            DB::table('careers')->insert([
                'name' => $career
            ]);
        }
    }
}

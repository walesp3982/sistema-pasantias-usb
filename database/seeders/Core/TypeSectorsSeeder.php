<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sectors = [
            'Tecnología y Software',
            'Consultoría IT y Negocios',
            'Finanzas y Contabilidad',
            'Salud y Biotecnología',
            'Educación',
            'Manufactura e Industria',
            'Marketing y Publicidad',
            'Legal y Jurídico',
            'Logística y Transporte',
            'Inmobiliario y Construcción',
            'Medios y Entretenimiento',
            'Turismo',
            'Telecomunicaciones'
        ];
        foreach ($sectors as $sector) {
            DB::table('sectors')->insert([
                'name' => $sector
            ]);
        }
    }
}

<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $GoodReports = [
            'constancia aceptación pasantía',
            'informes mensuales pasantía',
            'informes semanales pasantía',
            'certificado de pasantía'
        ];

        foreach($GoodReports as $report) {
            DB::table('type_reports')->insert([
                'name' => $report,
                'class' => 'good'
            ]);
        }
        $BadReports = [
            'Falta de asistencia',
            'Mala conducta'
        ];

        foreach($BadReports as $report) {
            DB::table('type_reports')->insert([
                'name' => $report,
                'class' => 'bad'
            ]);
        }
    }
}

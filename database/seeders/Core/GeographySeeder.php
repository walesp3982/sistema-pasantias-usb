<?php

namespace Database\Seeders\Core;

use App\Models\Geography\Municipality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeographySeeder extends Seeder{
    public function zones(string $path) {
        if(!file_exists($path) || !is_readable($path)) {
            throw new \Exception("No se puede leer el CSV");
        }

        $zones = [];
        if(($handle = fopen($path, 'r')) !== false) {
            $header = fgetcsv($handle);

            while(($row = fgetcsv($handle)) !== false) {
                yield [
                    "name" => $row[1],
                    "district_number" => $row[2],
                ];
            }
        }
        fclose($handle);
    }
    public function run() {
        $path = database_path('seeders/Core/Data/zonas_la_paz.csv');

        Municipality::create([
            "name" => "La Paz",
            "total_district" => 24,
        ])->zone()->createMany(
            iterator_to_array(
                $this->zones($path))
        );

        $path = database_path('seeders/Core/Data/zonas_el_alto.csv');
        Municipality::create([
            "name" => "El Alto",
            "total_district" => 14
        ])->zone()->createMany(
            iterator_to_array(
            $this->zones($path)
            )
        );
    }
}

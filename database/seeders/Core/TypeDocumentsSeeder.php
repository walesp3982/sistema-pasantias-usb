<?php

namespace Database\Seeders\Core;

use App\Enums\handleUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //
        $documentsCarrers = [
            'curriculum vitae',
            'carnet de identidad',
            'carta de presentación',
            'historial académico',

        ];

        foreach($documentsCarrers as $doc) {
            DB::table('type_document_postulations')->insert([
                'name' => $doc,
            ]);
        }



    }
}

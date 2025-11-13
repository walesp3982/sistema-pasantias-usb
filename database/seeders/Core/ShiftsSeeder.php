<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ShiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shifts')->insert([
            'name' => 'Mañana',
            'entry_time' => Carbon::parse('07:30')->format('H:i:s'),
            'exit_time' => Carbon::parse('12:30')->format('H:i:s')
        ]);

        DB::table('shifts')->insert([
            'name' => 'Tarde',
            'entry_time' => Carbon::parse('13:30')->format('H:i:s'),
            'exit_time' => Carbon::parse('18:15')->format('H:i:s')
        ]);
        DB::table('shifts')->insert([
            'name' => 'Noche',
            'entry_time' => Carbon::parse('19:00')->format('H:i:s'),
            'exit_time' => Carbon::parse('22:00')->format('H:i:s')
        ]);
    }
}

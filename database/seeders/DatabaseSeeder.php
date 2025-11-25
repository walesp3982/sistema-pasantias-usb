<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Database\Seeders\Core\CareersSeeder;
use Database\Seeders\Core\GeographySeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Core\PermissionSeeder;
use Database\Seeders\Core\ShiftsSeeder;
use Database\Seeders\Core\TypeDocumentsSeeder;
use Database\Seeders\Core\TypeReportsSeeder;
use Database\Seeders\Core\TypeSectorsSeeder;
use Database\Seeders\Fake\CareerDepartamentSeeder;
use Database\Seeders\Fake\CompanySeeder;
use Database\Seeders\Fake\InternshipSeeder;
use Database\Seeders\Fake\StudentSeeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            // Core seeder
            GeographySeeder::class,
            CareersSeeder::class,
            TypeReportsSeeder::class,
            ShiftsSeeder::class,
            TypeSectorsSeeder::class,
            PermissionSeeder::class,
            TypeDocumentsSeeder::class,
        ]);
        if(App::environment("local")) {
            $this->call([
                CareerDepartamentSeeder::class,
                CompanySeeder::class,
                StudentSeeder::class,
                InternshipSeeder::class,
            ]);
        }
    }
}

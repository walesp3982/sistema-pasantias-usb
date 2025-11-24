<?php

namespace Database\Seeders\Core;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos y guardar referencias
        $permissions = [
            'register internship',
            'register company',
            'register student',
            'create postulation',
            'verify postulation',
            'accept postulation',
            'register reports',
            'edit profile',
            'publish internship',
            'show stadistics',
            'register agreements company',
            'register career',
            'register members career',
            'register members agreement',
            'assign internships student'
        ];

        // Crear roles y asignar permisos por ID
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        // Ahora crear roles y asignar permisos
        $student = Role::create(['name' => RolesEnum::STUDENT->value]);
        $student->givePermissionTo(['create postulation', 'edit profile']);

        // $user = User::factory()->create([
        //     'name' => 'estudiante prueba',
        //     'email' => 'estudiante@gmail.com'
        // ]);
        // $user->assignRole($student);

        $careerDept = Role::create(['name' => RolesEnum::CAREER->value]);
        $careerDept->givePermissionTo([
            'register student',
            'publish internship',
            'verify postulation',
            'accept postulation',
            'register reports',
            'show stadistics'
        ]);
        // $user = User::factory()->create([
        //     'name' => 'dirección carrera',
        //     'email' => 'career@gmail.com'
        // ]);
        // $user->assignRole($careerDept);

        $agreementsDept = Role::create(['name' => RolesEnum::AGREEMENTS->value]);
        $agreementsDept->givePermissionTo([
            'register company',
            'register agreements company',
            'register internship',
            'show stadistics'
        ]);
        $user = User::factory()->create([
            'name' => 'dirección de convenios',
            'email' => 'convenios@gmail.com'
        ]);
        $user->assignRole($agreementsDept);

        $admin = Role::create(['name' => RolesEnum::ADMIN]);
        $admin->givePermissionTo([
            'register career',
            'register members career',
            'register members agreement'
        ]);
        $user = User::factory()->create([
            'name' => 'admin prueba',
            'email' => 'admin@gmail.com'
        ]);
        $user->assignRole($admin);

        $superAdmin = Role::create(['name' => 'Super-Admin']);
        $superAdmin->givePermissionTo(Permission::all());
        $user = User::factory()->create([
            'name' => 'superadmin prueba',
            'email' => 'superadmin@gmail.com'
        ]);
        $user->assignRole($superAdmin);
    }
}

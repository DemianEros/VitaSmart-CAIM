<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserToRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener los roles
        $roleAdmin = Role::where('name', 'Admin')->first();
        $roleAdministrativo = Role::where('name', 'Administrativo')->first();
        $roleVisor = Role::where('name', 'Visor')->first();

        // Asignar el rol de Admin al usuario correspondiente
        $adminUser = User::where('email', 'admin@example.com')->first();
        if ($adminUser && $roleAdmin) {
            $adminUser->assignRole($roleAdmin);
        }

        // Asignar el rol de Administrativo al usuario correspondiente
        $administUser = User::where('email', 'administ@example.com')->first();
        if ($administUser && $roleAdministrativo) {
            $administUser->assignRole($roleAdministrativo);
        }

        // Asignar el rol de Visor al usuario correspondiente
        $visorUser = User::where('email', 'visor@example.com')->first();
        if ($visorUser && $roleVisor) {
            $visorUser->assignRole($roleVisor);
        }
    }
}

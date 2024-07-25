<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuarios
        $user1 = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123')
        ]);

        $user2 = User::create([
            'name' => 'Empleado User',
            'email' => 'empleado@example.com',
            'password' => Hash::make('password123')
        ]);

        $user3 = User::create([
            'name' => 'Visor User',
            'email' => 'visor@example.com',
            'password' => Hash::make(' ')
        ]);

        // Obtener roles
        $roleAdmin = Role::where('name', 'Admin')->first();
        $roleEmpleado = Role::where('name', 'Administrativo')->first();
        $roleVisor = Role::where('name', 'Visor')->first();

        // Asignar roles a usuarios
        $user1->assignRole($roleAdmin);
        $user2->assignRole($roleEmpleado);
        $user3->assignRole($roleVisor);
    }
}

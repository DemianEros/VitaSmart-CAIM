<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear o encontrar el usuario Admin
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        // Crear o encontrar el usuario Administrativo
        User::firstOrCreate(
            ['email' => 'administ@example.com'],
            [
                'name' => 'Administrativo User',
                'password' => bcrypt('password'),
            ]
        );

        // Crear o encontrar el usuario Visor
        User::firstOrCreate(
            ['email' => 'visor@example.com'],
            [
                'name' => 'Visor User',
                'password' => bcrypt('password'),
            ]
        );
    }
}

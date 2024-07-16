<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AsignarRolesUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtener usuarios existentes
        $usuarios = User::all();

        // Obtener roles
        $roleAdmin = Role::where('name', 'Admin')->first();
        $roleAdministrativo = Role::where('name', 'Administrativo')->first();
        $roleVisor = Role::where('name', 'Visor')->first();

        // Asignar roles a cada usuario
        foreach ($usuarios as $usuario) {
            // Ejemplo: asignar roles basados en alguna lógica de tu aplicación
            if ($usuario->es_administrador) {
                $usuario->assignRole($roleAdmin);
            } elseif ($usuario->es_administrativo) {
                $usuario->assignRole($roleAdministrativo);
            } else {
                $usuario->assignRole($roleVisor);
            }
        }
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**dxs
     * Run the migrations.
     */
    public function up(): void
    {
        // Verificar si el rol 'admin' ya existe
        if (!Role::where('name', 'admin')->exists()) {
            $role1 = Role::create(['name' => 'admin']);
        } else {
            $role1 = Role::where('name', 'admin')->first();
        }

        // Verificar si el rol 'empleado' ya existe
        if (!Role::where('name', 'empleado')->exists()) {
            $role2 = Role::create(['name' => 'empleado']);
        } else {
            $role2 = Role::where('name', 'empleado')->first();
        }

        // Verificar si el rol 'visor' ya existe
        if (!Role::where('name', 'visor')->exists()) {
            $role3 = Role::create(['name' => 'visor']);
        } else {
            $role3 = Role::where('name', 'visor')->first();
        }

        // Asignar el rol al usuario con ID 1
        $user = User::find(1);
        if ($user) {
            $user->assignRole($role1);
        } else {
            // Manejar el caso en que el usuario no exista
            echo "Usuario con ID 1 no encontrado.";
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Aquí puedes agregar lógica para revertir los cambios si es necesario
    }
};

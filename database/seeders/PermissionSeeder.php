<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener los roles
        $roleAdmin = Role::where('name', 'Admin')->first();
        $roleEmpleado = Role::where('name', 'Administrativo')->first();
        $roleVisor = Role::where('name', 'Visor')->first();

        // Permisos para el módulo de Citas
        Permission::create(['name' => 'appointments.index'])->syncRoles([$roleAdmin, $roleEmpleado, $roleVisor]);
        Permission::create(['name' => 'appointments.create'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name' => 'appointments.store'])->syncRoles([$roleAdmin, $roleEmpleado, $roleVisor]);
        Permission::create(['name' => 'appointments.show'])->syncRoles([$roleAdmin, $roleEmpleado, $roleVisor]);
        Permission::create(['name' => 'appointments.edit'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name' => 'appointments.update'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name' => 'appointments.destroy'])->syncRoles([$roleAdmin, $roleEmpleado]);

        // Permisos para el módulo de Pacientes
        Permission::create(['name' => 'pacientes'])->syncRoles([$roleAdmin, $roleEmpleado, $roleVisor]);
        Permission::create(['name' => 'pacientes.create'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name' => 'pacientes.store'])->syncRoles([$roleAdmin, $roleEmpleado, $roleVisor]);
        Permission::create(['name' => 'pacientes.edit'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name' => 'pacientes.update'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name' => 'pacientes.destroy'])->syncRoles([$roleAdmin, $roleEmpleado]);
    }
}

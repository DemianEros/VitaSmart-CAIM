<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si los roles ya existen antes de crearlos
        $role1 = Role::firstOrCreate(['name' => 'Admin']);
        $role2 = Role::firstOrCreate(['name' => 'Administrativo']);
        $role3 = Role::firstOrCreate(['name' => 'Visor']);

        // Permisos para el módulo de Citas
        Permission::firstOrCreate(['name' => 'appointments.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::firstOrCreate(['name' => 'appointments.create'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'appointments.store'])->syncRoles([$role1, $role2, $role3]);
        Permission::firstOrCreate(['name' => 'appointments.show'])->syncRoles([$role1, $role2, $role3]);
        Permission::firstOrCreate(['name' => 'appointments.edit'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'appointments.update'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'appointments.destroy'])->syncRoles([$role1, $role2]);

        // Permisos para el módulo de Pacientes
        Permission::firstOrCreate(['name' => 'pacientes'])->syncRoles([$role1, $role2, $role3]);
        Permission::firstOrCreate(['name' => 'pacientes.create'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'pacientes.store'])->syncRoles([$role1, $role2, $role3]);
        Permission::firstOrCreate(['name' => 'pacientes.edit'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'pacientes.update'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'pacientes.destroy'])->syncRoles([$role1, $role2]);
    }
}

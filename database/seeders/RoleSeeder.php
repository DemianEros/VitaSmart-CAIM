<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Administrativo']);
        $role3 = Role::create(['name' => 'Visor']);

        //Permisos para el modulo de Citas
        Permission::create(['name' => 'appointments.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'appointments.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'appointments.store'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'appointments.show'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'appointments.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'appointments.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'appointments.destroy'])->syncRoles([$role1, $role2]);

        //Permisos para el modulo de Pacientes
        Permission::create(['name' => 'pacientes'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'pacientes.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'pacientes.store'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'pacientes.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'pacientes.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'pacientes.destroy'])->syncRoles([$role1, $role2]);
    }
}

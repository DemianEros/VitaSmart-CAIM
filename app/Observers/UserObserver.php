<?php

namespace App\Observers;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        // Asignar el rol 'visor' al nuevo usuario
        $role = Role::where('name', 'visor')->first();
        if ($role) {
            $user->assignRole($role);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('users', compact('users')); 
    }
    

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'role' => 'required|string|exists:roles,name',
    ]);

    $user->update($request->only('name', 'email'));

    // Actualizar rol del usuario
    $user->syncRoles($request->role);

    return redirect()->route('admin.users')->with('success', 'Usuario actualizado con éxito.');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|string|exists:roles,name', // Validar que el rol existe
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Asignar el rol al usuario
    $user->assignRole($request->role);

    return redirect()->route('admin.users')->with('success', 'Usuario agregado con éxito.');
}


}


<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Obtiene todos los usuarios
        return view('users', compact('users'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->update($request->all());
    return redirect()->route('admin.users')->with('success', 'Usuario actualizado con éxito.');
}

public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('admin.users')->with('success', 'Usuario eliminado con éxito.');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Crear un nuevo usuario
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password), // Asegúrate de encriptar la contraseña
    ]);

    return redirect()->route('admin.users')->with('success', 'Usuario agregado con éxito.');
}


}


<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $totalUsers = User::count();
        return view('Madmin.admin', compact('totalUsers'));
    }

    public function listUsers()
    {
        $users = User::all();
        return view('Madmin.users', compact('users'));
    }

    public function create()
    {
        return view('Madmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(Request $request)
    {
        $user = User::findOrFail($request->query('id'));
        return view('Madmin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente.');
    }

    public function listUsers()
    {
        $users = User::all();
        return view('Madmin.User', compact('users'));
    }
}

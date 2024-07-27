<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalPacientes = Paciente::count();
        $totalCitas = Appointment::count();
        $roles = Role::all();
    
        return view('Madmin.admin', compact('totalUsers', 'totalPacientes', 'totalCitas','roles'));
    }


    public function listUsers()
    {
        $users = User::all();
        $roles = Role::all(); 
        return view('Madmin.User', compact('users','roles'));
    }
}

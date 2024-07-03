<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IDYHomeController extends Controller
{
    public function index()
    {
        return view('idyworld.idyhome');
    }

    public function showsn()
    {
        return view('idyworld.sobrenosotros');
    }

    public function showeq()
    {
        return view('idyworld.equipo');
    }

    public function showcon()
    {
        return view('idyworld.contacto');
    }

    public function showcarr()
    {
        return view('idyworld.carreras');
    }
}
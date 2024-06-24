<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IDYHomeController extends Controller
{
    public function index()
    {
        return view('idyhome');
    }
}
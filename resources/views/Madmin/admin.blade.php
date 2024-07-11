@extends('layouts.layoutdash')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../EstilosAdmin/css/styles.css">
    <title>Admin</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <!-- Columna 1 -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.users') }}">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Total de usuarios registrados: {{ $totalUsers }}</p>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Roles</h5>
                    <p class="card-text">Texto de ejemplo para roles.</p>
                </div>
            </div>
        </div>

        <!-- Columna 2 -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pacientes') }}">
                        <h5 class="card-title">Pacientes</h5>
                        <p class="card-text">Texto de ejemplo para pacientes.</p>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('appointments.index') }}">
                        <h5 class="card-title">Citas</h5>
                        <p class="card-text">Texto de ejemplo para citas.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

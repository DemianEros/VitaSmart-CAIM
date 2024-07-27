@extends('layouts.layoutdash')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../EstilosAdmin/css/styles.css">
    <link rel="stylesheet" href="styleloader.css">
    <title>Admin</title>
</head>
<body>
    <div id="loader-wrapper">
        <span class="loader"></span>
    </div>

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

            <!-- Columna 2 -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('pacientes') }}">
                            <h5 class="card-title">Pacientes</h5>
                            <p class="card-text">Total de pacientes registrados: {{ $totalPacientes }}</p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Columna 3 -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('appointments.index') }}">
                            <h5 class="card-title">Citas</h5>
                            <p class="card-text">Total de citas registradas: {{ $totalCitas }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="scriptloader.js"></script>
</body>
@endsection

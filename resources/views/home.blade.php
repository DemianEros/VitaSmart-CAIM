@extends('layouts.layoutdash')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vita Smart</title>
    <link rel="stylesheet" href="EstilosHome/css/styles.css">
</head>
<body>
    <main>
        <div class="grid-container">
            <a href="{{ route('appointments.index')}}" class="grid-item">
                <img src="EstilosHome/imagenes/citas.png" alt="Módulo de Citas" class="img">
                <h2>Módulo de Citas</h2>
            </a>
            <a href="{{ route('pacientes') }}" class="grid-item">
                <img src="EstilosHome/imagenes/pacientes.png" alt="Módulo de Pacientes" class="img">
                <i class="fa-solid fa-calendar-days" style="color: #63E6BE;"></i>
                <h2>Módulo de Pacientes</h2>
            </a>
            <a href="{{ route('admin') }}" class="grid-item">
                <img src="EstilosHome/imagenes/Admin.png" alt="Módulo de Administrador" class="img">
                <h2>Módulo de Administrador</h2>
            </a>
            <a href="{{ route('bitacora') }}" class="grid-item">
                <img src="EstilosHome/imagenes/Bitacora.png" alt="Bitácora de Expedientes" class="img">
                <h2>Bitácora de Expedientes</h2>
            </a>
            <a href="{{ route('bitacora') }}" class="grid-item">
                <img src="EstilosHome/imagenes/reportes.png" alt="Módulo de Reportes" class="img">
                <h2>Módulo de Reportes</h2>
            </a>
            <a href="#" class="grid-item">
                <img src="EstilosHome/imagenes/conocenos.png" alt="Conócenos" class="img">
                <h2>Conócenos</h2>
            </a>
        </div>
    </main>
</body>
</html>
@endsection

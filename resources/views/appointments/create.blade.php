@extends('layouts.layoutdash')
@can('appointments.create')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleloader.css">
    <title>Crear cita</title>
</head>
<body>
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>
<div class="container">
        <h1>Crear Cita</h1>

        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Horario</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>

            <button type="submit" style="background-color: #74af7a; border-color: #34ff21; color:black" class="btn btn-primary">Crear cita</button>
            <button type="button" class="btn btn-secondary" id="cancelButton">Cancelar</button>
        </form>

        <!-- Cuadro de diálogo personalizado -->
    <div id="customDialog">
        <div class="dialogBox">
            <p>¿Estás seguro de que deseas cancelar? Los datos no se guardarán.</p>
            <button class="confirmBtn" id="confirmCancel">Sí</button>
            <button class="cancelBtn" id="cancelDialog">No</button>
        </div>
    </div>

    <script>
        document.getElementById('cancelButton').addEventListener('click', function() {
            document.getElementById('customDialog').style.display = 'flex';
        });

        document.getElementById('confirmCancel').addEventListener('click', function() {
            window.location.href = "{{ route('pacientes') }}";
        });

        document.getElementById('cancelDialog').addEventListener('click', function() {
            document.getElementById('customDialog').style.display = 'none';
        });
    </script>

    </div>
    <script src="scriptloader.js"></script>
</body>
</html>
@endsection
@endcan
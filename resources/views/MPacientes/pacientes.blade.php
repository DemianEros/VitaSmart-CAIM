@extends('layouts.layoutdash')
@section('paciente')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../EstilosPacientes/css/styles.css">
    <title>Pacientes</title>
    <style>
        /* Estilo para el div con scroll */
        .scrollable-table {
            max-height: 400px; /* Altura máxima del div */
            overflow-y: auto; /* Habilitar el scroll vertical */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Lista de Pacientes</h1>
        <div class="button-group mb-3">
            <a href="{{ route('pacientes.create') }}" class="btn btn-success">Crear Paciente</a>
        </div>
        <div class="scrollable-table">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>EXP</th>
                        <th>Fecha de Ingreso</th>
                        <th>CURP</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->nombre }}</td>
                            <td>{{ $paciente->paterno }}</td>
                            <td>{{ $paciente->materno }}</td>
                            <td>{{ $paciente->exp }}</td>
                            <td>{{ $paciente->fecha_ing }}</td>
                            <td>{{ $paciente->curp }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="input-container mt-3">
            <div class="form-group">
                <input type="text" class="form-control" id="searchNombre" placeholder="Buscar por nombre">
                <input type="text" class="form-control" id="searchApellido" placeholder="Buscar por apellido">
                <input type="text" class="form-control" id="searchCurp" placeholder="Buscar por CURP">
                <input type="text" class="form-control" id="searchExp" placeholder="Buscar por EXP">
            </div>
            <div class="button-group">
                <button class="btn btn-primary" type="button" id="searchButton">Buscar</button>
                <button class="btn btn-secondary" type="button" id="clearButton">Limpiar</button>
            </div>
        </div>
    </div>
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            var searchNombre = document.getElementById('searchNombre').value;
            var searchApellido = document.getElementById('searchApellido').value;
            var searchCurp = document.getElementById('searchCurp').value;
            var searchExp = document.getElementById('searchExp').value;
            // Redirigir a la misma página pero con la cadena de búsqueda como parámetro
            window.location.href = "{{ route('pacientes') }}?nombre=" + searchNombre + "&apellido=" + searchApellido + "&curp=" + searchCurp + "&exp=" + searchExp;
        });

        document.getElementById('clearButton').addEventListener('click', function() {
            // Limpiar todos los campos de búsqueda y redirigir a la página sin la cadena de búsqueda
            document.getElementById('searchNombre').value = '';
            document.getElementById('searchApellido').value = '';
            document.getElementById('searchCurp').value = '';
            document.getElementById('searchExp').value = '';
            window.location.href = "{{ route('pacientes') }}";
        });
    </script>
</body>
</html>
@endsection

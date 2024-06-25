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
            max-height: 400px;
            overflow-y: auto;
        }

        /* Estilos para el cuadro de diálogo personalizado */
        #customDialog {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none; /* Oculto por defecto */
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Asegura que el diálogo esté sobre otros elementos */
        }

        .dialogBox {
            background-color: #d4edda;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 400px; /* Añade un ancho máximo */
            width: 100%; /* Asegura que no exceda el contenedor */
        }

        .dialogBox p {
            margin: 0 0 20px;
        }

        .dialogBox button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .dialogBox .confirmBtn {
            background-color: #28a745;
            color: white;
        }

        .dialogBox .cancelBtn {
            background-color: #dc3545;
            color: white;
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
                        <th>Acciones</th>
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
                            <td>
                                <a href="{{ route('pacientes.edit', ['id' => $paciente->id]) }}" class="btn btn-editar btn-sm">Editar</a>
                                <form action="{{ route('pacientes.destroy', ['id' => $paciente->id]) }}" method="POST" class="deleteForm" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm deleteButton">Eliminar</button>
                                </form>
                            </td>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            var searchNombre = document.getElementById('searchNombre').value;
            var searchApellido = document.getElementById('searchApellido').value;
            var searchCurp = document.getElementById('searchCurp').value;
            var searchExp = document.getElementById('searchExp').value;
            window.location.href = "{{ route('pacientes') }}?nombre=" + searchNombre + "&apellido=" + searchApellido + "&curp=" + searchCurp + "&exp=" + searchExp;
        });

        document.getElementById('clearButton').addEventListener('click', function() {
            document.getElementById('searchNombre').value = '';
            document.getElementById('searchApellido').value = '';
            document.getElementById('searchCurp').value = '';
            document.getElementById('searchExp').value = '';
            window.location.href = "{{ route('pacientes') }}";
        });

        document.querySelectorAll('.deleteButton').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                const dialog = document.getElementById('customDialog');
                dialog.style.display = 'flex';

                document.getElementById('confirmDelete').onclick = function() {
                    form.submit();
                };

                document.getElementById('cancelDelete').onclick = function() {
                    dialog.style.display = 'none';
                };
            });
        });
    </script>
</body>
</html>
@endsection

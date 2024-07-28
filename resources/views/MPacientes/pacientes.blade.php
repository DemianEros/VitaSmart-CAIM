@extends('layouts.layoutdash')
@section('paciente')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../EstilosPacientes/css/styles.css">
    <link rel="stylesheet" href="styleloader.css">
    <title>Pacientes</title>
    
</head>
<body>
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>

    <div class="container">
        <h1 class="mt-5">Lista de Pacientes</h1>
        @role('Admin|Administrativo')
        <div class="button-group mb-3">
            <a href="{{ route('pacientes.create') }}" class="btn btn-success">Crear Paciente</a>
        </div>
        @endrole
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
                        @role('Admin|Administrativo')
                        <th>Acciones</th>
                        @endrole
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
                            @role('Admin|Administrativo')
                            <td>
                                <a href="{{ route('pacientes.edit', ['id' => $paciente->id]) }}" class="btn btn-editar btn-sm">Editar</a>
                                <form action="{{ route('pacientes.destroy', ['id' => $paciente->id]) }}" method="POST" class="deleteForm" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
                                </form>
                            </td>
                            @endrole
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

    <!-- Modal de Confirmación de Eliminación -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este paciente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <form action="{{ route('pacientes', ['id' => $paciente->id]) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
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

                const id = this.getAttribute('data-id');

                document.getElementById('confirmDelete').onclick = function() {
                    form.submit();
                };

                document.getElementById('cancelDelete').onclick = function() {
                    dialog.style.display = 'none';
                };
            });
        });
    </script>
    <script src="scriptloader.js"></script>
</body>
</html>
@endsection

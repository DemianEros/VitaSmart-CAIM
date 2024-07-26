@extends('layouts.layoutdash')

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
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">Cancelar</button>
        </form>

        <!-- Modal de Confirmación de Cancelación -->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Confirmar Cancelación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas cancelar la edición de la cita?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <a href="{{ route('appointments.index') }}" class="btn btn-success">Confirmar Cancelación</a>
            </div>
        </div>
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

    <script>
    // Establecer la fecha mínima en el campo de fecha
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // Enero es 0!
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('date').setAttribute('min', today);
    });
</script>
</body>
</html>
@endsection

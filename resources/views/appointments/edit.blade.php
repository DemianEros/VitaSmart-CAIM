@extends('layouts.layoutdash')

@section('content')
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleloader.css">
    <title>Editar cita</title>
 </head>
 <body>
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>
 <div class="container">
        <h1>Editar Cita</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('appointments.update', ['id' => $appointment->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $appointment->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $appointment->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $appointment->phone) }}" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $appointment->date) }}" required>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Horario</label>
                <input type="time" class="form-control" id="time" name="time" value="{{ old('time', \Carbon\Carbon::parse($appointment->time)->format('H:i')) }}" required>
            </div>

            <button type="submit" style="background-color: #74af7a; border-color: #34ff21; color:black" class="btn btn-primary">Actualizar Cita</button>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <a href="{{ route('appointments.index') }}" class="btn btn-danger">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmación de Salida -->
<div class="modal fade" id="exitModal" tabindex="-1" role="dialog" aria-labelledby="exitModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exitModalLabel">Confirmar Salida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas salir? Los cambios no guardados se perderán.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmExit">Confirmar</button>
            </div>
        </div>
    </div>
</div>


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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        const form = document.querySelector('form'); // Selecciona el formulario

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Evita la navegación inmediata
                const targetUrl = this.getAttribute('href'); // Obtiene la URL del enlace

                // Muestra el modal de confirmación
                $('#exitModal').modal('show');

                // Maneja la confirmación de salida
                document.getElementById('confirmExit').onclick = function() {
                    window.location.href = targetUrl; // Redirige a la URL del enlace
                };
            });
        });
    });
</script>

 </body>
 </html>
@endsection

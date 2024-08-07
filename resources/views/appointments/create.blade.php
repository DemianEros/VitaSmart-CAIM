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

        <form id="appointmentForm" action="{{ route('appointments.store') }}" method="POST">
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
                <select class="form-control" id="time" name="time" required>
                    <option value="">Seleccione un horario</option>
                    <!-- Los horarios se llenarán aquí -->
                </select>
            </div>

            <button type="submit" style="background-color: #74af7a; border-color: #34ff21; color:black" class="btn btn-primary">Crear cita</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">Cancelar</button>
        </form>

        <script>
    document.getElementById('appointmentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (response.ok) {
                window.location.href = '{{ route('appointments.index') }}'; // Redirigir si la cita se creó con éxito
            } else if (response.status === 409) {
                // Mostrar el modal de advertencia si ya existe una cita en ese horario
                $('#warningModal').modal('show');
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

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

<!-- Modal de Advertencia -->
<div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="warningModalLabel">Advertencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Ya existe una cita en este horario.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Definir los horarios permitidos
            const allowedTimes = [];
            for (let hour = 8; hour < 18; hour++) { // De 7 AM a 7 PM
                for (let minute = 0; minute < 60; minute += 30) {
                    const time = `${String(hour).padStart(2, '0')}:${String(minute).padStart(2, '0')}`;
                    allowedTimes.push(time);
                }
            }

            // Llenar el campo de horario con los tiempos permitidos
            const timeSelect = document.getElementById('time');
            allowedTimes.forEach(time => {
                const option = document.createElement('option');
                option.value = time;
                option.textContent = time;
                timeSelect.appendChild(option);
            });
        });
    </script>
</body>
</html>
@endsection

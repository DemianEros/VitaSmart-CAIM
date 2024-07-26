@extends('layouts.layoutdash')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleloader.css">
    <title>Detalle</title>
</head>
<body>
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>
<div class="container">
        <h1>Detalles de cita</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $appointment->name }}</h5>
                <p class="card-text">
                    Email: {{ $appointment->email }}<br>
                    Telefono: {{ $appointment->phone }}<br>
                    Fecha: {{ $appointment->date }}<br>
                    Horario: {{ $appointment->time }}
                </p>
                <a href="{{ route('appointments.edit', ['id' => $appointment->id]) }}" style="background-color: #74af7a; border-color: #34ff21; color:black" class="btn btn-primary">Editar</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
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
                ¿Estás seguro de que deseas eliminar esta cita?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form action="{{ route('appointments.destroy', ['id' => $appointment->id]) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="scriptloader.js"></script>
</body>
</html>
@endsection

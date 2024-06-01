@extends('layouts.layoutdash')

@section('content')
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
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

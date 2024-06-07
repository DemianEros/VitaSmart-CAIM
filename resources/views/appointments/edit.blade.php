@extends('layouts.layoutdash')

@section('content')
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

            <button type="submit" class="btn btn-primary">Actualizar Cita</button>
        </form>
    </div>
@endsection

<!-- resources/views/Madmin/edit.blade.php -->

@extends('layouts.layoutdash')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <!-- Añade otros campos que necesites editar -->
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection

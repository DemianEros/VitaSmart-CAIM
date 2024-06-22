@extends('layouts.layoutdash')

@section('paciente')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('EstilosPacientes/css/crear.css') }}">
    <title>Crear Paciente</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Crear Paciente</h1>
        <form action="{{ route('pacientes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="js">Jurisdicción</label>
                <input type="text" name="js" class="form-control" value="IZTAPALAPA" readonly>
            </div>
            <div class="form-group">
                <label for="unidad">Unidad</label>
                <input type="text" name="unidad" class="form-control" value="CLÍNICA DE ATENCIÓN INTEGRAL A LA MUJER" readonly>
            </div>
            <div class="form-group">
                <label for="exp">Expediente</label>
                <input type="text" name="exp" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="curp">CRRP</label>
                <input type="text" name="curp" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="fecha_ing">Fecha Ingreso</label>
                <input type="date" name="fecha_ing" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno</label>
                <input type="text" name="paterno" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="materno">Apellido Materno</label>
                <input type="text" name="materno" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select name="sexo" class="form-control" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nac">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nac" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="parent">Parentesco</label>
                <input type="text" name="parent" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="colonia">Colonia</label>
                <input type="text" name="colonia" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="calle">Calle</label>
                <input type="text" name="calle" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" name="numero" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="seg_pop">Seguro Popular</label>
                <input type="text" name="seg_pop" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="vencimiento_sp">Vencimiento</label>
                <input type="date" name="vencimiento_sp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gratuidad">Gratuidad</label>
                <select name="gratuidad" class="form-control" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" id="cancelButton">Cancelar</button>
        </form>
    </div>

    <script>
        document.getElementById('cancelButton').addEventListener('click', function() {
            if (confirm('¿Estás seguro de que deseas cancelar? Los datos no se guardarán.')) {
                window.location.href = "{{ route('pacientes') }}";
            }
        });
    </script>
</body>
</html>
@endsection

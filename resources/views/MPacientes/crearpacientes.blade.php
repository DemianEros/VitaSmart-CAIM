@extends('layouts.layoutdash')

@section('paciente')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('EstilosPacientes/css/crear.css') }}">
    <link rel="stylesheet" href="styleloader.css">
    <title>Crear Paciente</title>
</head>
<body>
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>

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
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">Cancelar</button>
        </form>
    </div>


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
                    <a href="{{ route('pacientes') }}" class="btn btn-danger">Confirmar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="scriptloader.js"></script>
</body>
</html>
@endsection

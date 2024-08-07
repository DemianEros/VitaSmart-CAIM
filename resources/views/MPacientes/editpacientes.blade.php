@extends('layouts.layoutdash')

@section('paciente')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('EstilosPacientes/css/crear.css') }}">
    <link rel="stylesheet" href="styleloader.css">
    <title>Editar Paciente</title>
</head>
<body>
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>

    <div class="container">
        <h1 class="mt-5">Editar Paciente</h1>
        <form action="{{ route('pacientes.update', ['id' => $paciente->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="js">Jurisdicción</label>
                <input type="text" name="js" class="form-control" value="{{ $paciente->js }}" readonly>
            </div>
            <div class="form-group">
                <label for="unidad">Unidad</label>
                <input type="text" name="unidad" class="form-control" value="{{ $paciente->unidad }}" readonly>
            </div>
            <div class="form-group">
                <label for="exp">Expediente</label>
                <input type="text" name="exp" class="form-control" value="{{ $paciente->exp }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <hr>
            <h1>Datos personales</h1>
            <div class="form-group">
                <label for="curp">CURP</label>
                <input type="text" name="curp" class="form-control" value="{{ $paciente->curp }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="paterno">Apellido Paterno</label>
                <input type="text" name="paterno" class="form-control" value="{{ $paciente->paterno }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="materno">Apellido Materno</label>
                <input type="text" name="materno" class="form-control" value="{{ $paciente->materno }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $paciente->nombre }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select name="sexo" class="form-control" required>
                    <option value="M" {{ $paciente->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ $paciente->sexo == 'F' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nac">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nac" class="form-control" value="{{ $paciente->fecha_nac }}" required>
            </div>
            <div class="form-group">
                <label for="colonia">Colonia</label>
                <input type="text" name="colonia" class="form-control" value="{{ $paciente->colonia }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="calle">Calle</label>
                <input type="text" name="calle" class="form-control" value="{{ $paciente->calle }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" name="numero" class="form-control" value="{{ $paciente->numero }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $paciente->telefono }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <hr>
            <h1>Datos del registro</h1>
            <div class="form-group">
                <label for="fecha_ing">Fecha Ingreso</label>
                <input type="date" name="fecha_ing" class="form-control" value="{{ $paciente->fecha_ing }}" required readonly>
            </div>
            <div class="form-group">
                <label for="parent">Parentesco</label>
                <select name="parent" class="form-control" required>
                    <option value="titular" {{ $paciente->parent == 'titular' ? 'selected' : '' }}>Titular</option>
                    <option value="padre" {{ $paciente->parent == 'padre' ? 'selected' : '' }}>Padre</option>
                    <option value="abuelo" {{ $paciente->parent == 'abuelo' ? 'selected' : '' }}>Abuelo</option>
                    <option value="hijo" {{ $paciente->parent == 'hijo' ? 'selected' : '' }}>Hijo</option>
                    <option value="conyuge" {{ $paciente->parent == 'conyuge' ? 'selected' : '' }}>Cónyuge</option>
                </select>
            </div>
            <div class="form-group">
                <label for="seg_pop">Seguro Popular</label>
                <input type="text" name="seg_pop" class="form-control" value="{{ $paciente->seg_pop }}" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="vencimiento_sp">Vencimiento</label>
                <input type="date" name="vencimiento_sp" class="form-control" value="{{ $paciente->vencimiento_sp }}" required>
            </div>
            <div class="form-group">
                <label for="gratuidad">Gratuidad</label>
                <select name="gratuidad" class="form-control" required>
                    <option value="1" {{ $paciente->gratuidad == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ $paciente->gratuidad == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
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
                    ¿Estás seguro de que deseas cancelar la edición del paciente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="{{ route('pacientes') }}" class="btn btn-danger">Confirmar</a>
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


    <script src="scriptloader.js"></script>

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

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
            <hr>
            <h1>Datos personales</h1>
            <div class="form-group">
                <label for="curp">CURP</label>
                <input type="text" name="curp" class="form-control" required oninput="this.value = this.value.toUpperCase()">
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
            <hr>
            <h1>Datos del registro</h1>
            <div class="form-group">
                <label for="fecha_ing">Fecha Ingreso</label>
                <input type="date" id="fecha_ing" name="fecha_ing" class="form-control" required readonly>
            </div>
            <div class="form-group">
                <label for="parent">Parentesco</label>
                <select name="parent" class="form-control" required>
                    <option value="titular">Titular</option>
                    <option value="padre">Padre</option>
                    <option value="abuelo">Abuelo</option>
                    <option value="hijo">Hijo</option>
                    <option value="conyuge">Cónyuge</option>
                </select>
            </div>
            <div class="form-group">
                <label for="seg_pop">Seguro Popular</label>
                <input type="text" name="seg_pop" class="form-control" required oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="vencimiento_sp">Vencimiento</label>
                <input type="date" id="vencimiento_sp" name="vencimiento_sp" class="form-control" required readonly>
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
                    ¿Estás seguro de que deseas cancelar la creación de la cita?
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

<script>
    // Función para obtener la fecha actual en formato YYYY-MM-DD
    function getCurrentDate() {
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        let yyyy = today.getFullYear();
        return yyyy + '-' + mm + '-' + dd;
    }

    // Función para establecer la fecha de vencimiento un año después de la fecha de ingreso
    function setExpiryDate() {
        let fechaIngreso = new Date(document.getElementById("fecha_ing").value);
        fechaIngreso.setFullYear(fechaIngreso.getFullYear() + 1);
        let dd = String(fechaIngreso.getDate()).padStart(2, '0');
        let mm = String(fechaIngreso.getMonth() + 1).padStart(2, '0');
        let yyyy = fechaIngreso.getFullYear();
        document.getElementById("vencimiento_sp").value = yyyy + '-' + mm + '-' + dd;
    }

    // Ejecutar al cargar la página
    window.onload = function() {
        document.getElementById("fecha_ing").value = getCurrentDate();
        setExpiryDate();
    }
</script>

</body>
</html>
@endsection

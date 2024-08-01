@extends('layouts.layoutdash')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../EstilosBitacora/CSS/tablas.css">
    <link rel="stylesheet" href="styleloader.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>
    <div class="container">  
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>En archivo clínico</h2>
                    <input type="text" id="searchExpediente" placeholder="Buscar por Expediente" class="form-control mb-3" onkeyup="filterTable('enArchivo')">
                    
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-striped table-green-light" style="font-size: 0.9rem; width: 100%;" id="enArchivo">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Expediente</th>
                                    <th scope="col">Hora de Entrada</th>
                                    <th scope="col">Fecha de Entrega</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enArchivo as $registro)
                                    <tr>
                                        <td>{{ $registro->paciente->exp }}</td>
                                        <td>{{ $registro->hora_entrada }}</td>
                                        <td>{{ $registro->fecha_entrega }}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalSalida" data-expediente="{{ $registro->paciente->exp }}">
                                                <i class="bi bi-arrow-left-right"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <h2>Fuera de archivo clínico</h2>
                    <input type="text" id="searchExpedienteFuera" placeholder="Buscar por Expediente" class="form-control mb-3" onkeyup="filterTable('fueraArchivo')">
                    
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-striped table-green-light" style="font-size: 0.9rem; width: 100%;" id="fueraArchivo">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Expediente</th>
                                    <th scope="col">Fecha de Salida</th>
                                    <th scope="col">Hora de Salida</th>
                                    <th scope="col">Nombre Extractor</th>
                                    <th scope="col">Área</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fueraArchivo as $registro)
                                    <tr>
                                        <td>{{ $registro->paciente->exp }}</td>
                                        <td>{{ $registro->fecha_salida }}</td>
                                        <td>{{ $registro->hora_salida }}</td>
                                        <td>{{ $registro->nombre_extractor }}</td>
                                        <td>{{ $registro->area }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEntrada" data-expediente="{{ $registro->paciente->exp }}">
                                                <i class="bi bi-arrow-left-right"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function filterTable(tableId) {
            const input = tableId === 'enArchivo' ? document.getElementById('searchExpediente') : document.getElementById('searchExpedienteFuera');
            const filter = input.value.toLowerCase();
            const table = document.getElementById(tableId);
            const rows = table.getElementsByTagName('tr');
    
            for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
                const cells = rows[i].getElementsByTagName('td');
                const expediente = cells[0].textContent.toLowerCase(); // Assuming the first cell contains the expediente
    
                if (expediente.indexOf(filter) > -1) {
                    rows[i].style.display = ""; // Show row
                } else {
                    rows[i].style.display = "none"; // Hide row
                }
            }
        }
        
        // Function to handle setting the expediente number in the modal
        $('#modalEntrada').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var expediente = button.data('expediente'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#expedienteEntrada').val(expediente).prop('readonly', true);
        });

        $('#modalSalida').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var expediente = button.data('expediente'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#expedienteSalida').val(expediente).prop('readonly', true);
        });
    </script>
    
    <style>
        /* Estilo para anclar los encabezados */
        .table-responsive {
            position: relative;
        }
        .table thead th {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #f8f9fa; /* Color de fondo para el encabezado */
        }
    </style>

<!-- Modal Entrada -->
<div class="modal fade" id="modalEntrada" tabindex="-1" aria-labelledby="modalEntradaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('bitacora.update', 'entry') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEntradaLabel">Registrar Entrada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="expedienteEntrada">Expediente</label>
                            <input type="text" class="form-control" id="expedienteEntrada" name="expediente" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="horaEntrada">Hora de Entrada</label>
                            <input type="time" class="form-control" id="horaEntrada" name="hora_entrada" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fechaEntrega">Fecha de Entrega</label>
                            <input type="date" class="form-control" id="fechaEntrega" name="fecha_entrega" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estatusEntrada">Estatus</label>
                            <select class="form-control" id="estatusEntrada" name="estatus" required>
                                <option value="0">Dentro del archivo</option>
                                <option value="1">Fuera del archivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Salida -->
<div class="modal fade" id="modalSalida" tabindex="-1" aria-labelledby="modalSalidaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('bitacora.update', 'exit') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSalidaLabel">Registrar Salida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="expedienteSalida">Expediente</label>
                            <input type="text" class="form-control" id="expedienteSalida" name="expediente" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fechaSalida">Fecha de Salida</label>
                            <input type="date" class="form-control" id="fechaSalida" name="fecha_salida" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="horaSalida">Hora de Salida</label>
                            <input type="time" class="form-control" id="horaSalida" name="hora_salida" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombreExtractor">Nombre Extractor</label>
                            <input type="text" class="form-control" id="nombreExtractor" name="nombre_extractor" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="area">Área</label>
                            <input type="text" class="form-control" id="area" name="area" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estatusSalida">Estatus</label>
                            <select class="form-control" id="estatusSalida" name="estatus" required>
                                <option value="0">Dentro del archivo</option>
                                <option value="1">Fuera del archivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Function to handle setting the expediente number in the modal
    $('#modalEntrada').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var expediente = button.data('expediente'); // Extract info from data-* attributes
        console.log('Expediente en modal entrada: ' + expediente); // Añadido para depuración
        var modal = $(this);
        modal.find('#expedienteEntrada').val(expediente).prop('readonly', true);
    });

    $('#modalSalida').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var expediente = button.data('expediente'); // Extract info from data-* attributes
        console.log('Expediente en modal salida: ' + expediente); // Añadido para depuración
        var modal = $(this);
        modal.find('#expedienteSalida').val(expediente).prop('readonly', true);
    });
</script>
<script src="scriptloader.js"></script>
</body>
</html>
@endsection

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<div class="container">  
    <div class="container mt-5">
        <h2>En archivo clínico</h2>
        <table class="table table-striped table-green-light">
            <thead>
                <tr>
                    <th scope="col">Expediente</th>
                    <th scope="col">Hora de Entrada</th>
                    <th scope="col">Fecha de Entrega</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>08:30 AM</td>
                    <td>2024-07-27</td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalSalida">
                            <i class="bi bi-arrow-left-right"></i> 
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>09:00 AM</td>
                    <td>2024-07-27</td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalSalida">
                            <i class="bi bi-arrow-left-right"></i> 
                        </a>
                    </td>
                </tr>
                <!-- Agrega más filas aquí según sea necesario -->
            </tbody>
        </table>
        
        <h2>Fuera de archivo clínico</h2>
        <table class="table table-striped table-green-light">
            <thead>
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
                <tr>
                    <td>001</td>
                    <td>2024-07-27</td>
                    <td>05:00 PM</td>
                    <td>Juan Pérez</td>
                    <td>Marketing</td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEntrada">
                            <i class="bi bi-arrow-left-right"></i> 
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>2024-07-27</td>
                    <td>06:00 PM</td>
                    <td>María López</td>
                    <td>Finanzas</td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEntrada">
                            <i class="bi bi-arrow-left-right"></i> 
                        </a>
                    </td>
                </tr>
                <!-- Agrega más filas aquí según sea necesario -->
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Entrada -->
<div class="modal fade" id="modalEntrada" tabindex="-1" aria-labelledby="modalEntradaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
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
                            <input type="text" class="form-control" id="expedienteEntrada" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="horaEntrada">Hora de Entrada</label>
                            <input type="time" class="form-control" id="horaEntrada" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fechaEntrega">Fecha de Entrega</label>
                            <input type="date" class="form-control" id="fechaEntrega" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estatusEntrada">Estatus</label>
                            <select class="form-control" id="estatusEntrada" required>
                                <option value="dentro">Dentro del archivo</option>
                                <option value="fuera">Fuera del archivo</option>
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
            <form>
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
                            <input type="text" class="form-control" id="expedienteSalida" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fechaSalida">Fecha de Salida</label>
                            <input type="date" class="form-control" id="fechaSalida" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="horaSalida">Hora de Salida</label>
                            <input type="time" class="form-control" id="horaSalida" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombreExtractor">Nombre Extractor</label>
                            <input type="text" class="form-control" id="nombreExtractor" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="area">Área</label>
                            <input type="text" class="form-control" id="area" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estatusSalida">Estatus</label>
                            <select class="form-control" id="estatusSalida" required>
                                <option value="dentro">Dentro del archivo</option>
                                <option value="fuera">Fuera del archivo</option>
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

</body>
</html>
@endsection
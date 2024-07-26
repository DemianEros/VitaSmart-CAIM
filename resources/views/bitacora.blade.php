@extends('layouts.layoutdash')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitacora</title>

</head>
<body> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitácora de Entrada y Salida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }
        header {
            background: #0c5b39;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #77D42A 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            list-style: none;
        }
        header li {
            float: left;
            display: inline;
            padding: 0 20px 0 20px;
        }
        header #branding {
            float: left;
        }
        header #branding h1 {
            margin: 0;
        }
        header nav {
            float: right;
            margin-top: 10px;
        }
        #main {
            padding: 20px;
            background: #fff;
            margin-top: 10px;
        }
        form {
            margin-bottom: 20px;
        }
        form input[type="text"],
        form input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
        }
        form input[type="submit"] {
            width: 100%;
            background: #333;
            color: #fff;
            padding: 10px;
            border: 0;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #333;
            color: #fff;
        }
        .entry-row {
            background-color: #d4edda; /* Green background for entries */
        }
        .exit-row {
            background-color: #f8d7da; /* Red background for exits */
        }
        .hidden {
            display: none;
        }
        #toggleButton {
            width: 100%;
            background: #0c5b39;
            color: #fff;
            padding: 10px;
            border: 0;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Bitácora</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#registro">Registro</a></li>
                    <li><a href="javascript:void(0);" id="toggleButton">Ver Registros</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <section id="main">
            <h2 id="registro">Registro</h2>
            <form id="entryForm">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>

                <label for="entryTime">Hora de Entrada:</label>
                <input type="datetime-local" id="entryTime" name="entryTime" required>

                <label for="exitTime">Hora de Salida:</label>
                <input type="datetime-local" id="exitTime" name="exitTime">

                <input type="submit" value="Registrar">
            </form>
            <div id="registros" class="hidden">
                <table id="entryTable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Hora de Entrada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se añadirán las filas de entradas -->
                    </tbody>
                </table>
                <table id="exitTable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Hora de Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se añadirán las filas de salidas -->
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script>
        document.getElementById('entryForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Obtener valores del formulario
            const name = document.getElementById('name').value;
            const entryTime = document.getElementById('entryTime').value;
            const exitTime = document.getElementById('exitTime').value;

            // Guardar en el almacenamiento local
            saveEntry(name, entryTime, exitTime);

            // Crear una nueva fila y celdas para la tabla de entradas
            addEntryToTable(name, entryTime, exitTime);

            // Mostrar ventana emergente para el registro de entrada
            alert('Entrada registrada satisfactoriamente.');

            // Limpiar formulario
            document.getElementById('entryForm').reset();

            // Iniciar la verificación periódica de las horas de salida
            checkExitTimes();
        });

        document.getElementById('toggleButton').addEventListener('click', function() {
            const registrosDiv = document.getElementById('registros');
            const entryForm = document.getElementById('entryForm');
            registrosDiv.classList.toggle('hidden');
            entryForm.classList.toggle('hidden');
            this.textContent = registrosDiv.classList.contains('hidden') ? 'Ver Registros' : 'Ocultar Registros';
        });

        function saveEntry(name, entryTime, exitTime) {
            const entries = JSON.parse(localStorage.getItem('entries')) || [];
            entries.push({ name, entryTime, exitTime });
            localStorage.setItem('entries', JSON.stringify(entries));
        }

        function addEntryToTable(name, entryTime, exitTime) {
            // Crear una nueva fila y celdas para la tabla de entradas
            const entryTable = document.getElementById('entryTable').getElementsByTagName('tbody')[0];
            const newEntryRow = entryTable.insertRow(entryTable.rows.length);
            newEntryRow.classList.add('entry-row'); // Añadir clase para el color verde
            const nameCellEntry = newEntryRow.insertCell(0);
            const entryTimeCell = newEntryRow.insertCell(1);
            nameCellEntry.innerHTML = name;
            entryTimeCell.innerHTML = entryTime;

            // Si hay una hora de salida, crear una nueva fila y celdas para la tabla de salidas
            if (exitTime) {
                const exitTable = document.getElementById('exitTable').getElementsByTagName('tbody')[0];
                const newExitRow = exitTable.insertRow(exitTable.rows.length);
                newExitRow.classList.add('exit-row'); // Añadir clase para el color rojo
                const nameCellExit = newExitRow.insertCell(0);
                const exitTimeCell = newExitRow.insertCell(1);
                nameCellExit.innerHTML = name;
                exitTimeCell.innerHTML = exitTime;
            }
        }

        function loadEntries() {
            const entries = JSON.parse(localStorage.getItem('entries')) || [];
            entries.forEach(entry => addEntryToTable(entry.name, entry.entryTime, entry.exitTime));
        }

        function checkExitTimes() {
            // Obtener la hora actual
            const now = new Date().toISOString();

            // Obtener todas las filas de la tabla de salidas
            const exitRows = document.getElementById('exitTable').getElementsByTagName('tbody')[0].rows;

            for (let i = 0; i < exitRows.length; i++) {
                const exitTime = exitRows[i].cells[1].innerText;

                // Calcular la diferencia en minutos entre la hora de salida y la hora actual
                const diff = (new Date(exitTime) - new Date(now)) / 1000 / 60;

                // Si la hora de salida está próxima (por ejemplo, 10 minutos antes)
                if (diff > 0 && diff <= 10) {
                    alert(`La hora de salida para ${exitRows[i].cells[0].innerText} está próxima (${exitTime}).`);
                }
            }

            // Configurar para verificar nuevamente en 1 minuto
            setTimeout(checkExitTimes, 60000);
        }

        // Cargar entradas al cargar la página
        window.onload = function() {
            loadEntries();
            checkExitTimes();
        }
    </script>
</body>
</html>




</body>
</html>
@endsection
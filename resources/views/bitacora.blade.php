@extends('layouts.layoutdash')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleloader.css">
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
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>
    <h1>Esta es a prueba de Bitacora</h1>

    <script src="scriptloader.js"></script>
</body>
</html>
@endsection
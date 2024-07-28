@extends('layouts.layoutdash')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleloader.css">
    <title>Citas</title>
</head>
<body>
        <div id="loader-wrapper">
            <span class="loader"></span>
        </div>

<div class="container">
        @can('appointments.create')
        <h1>Calendario de Citas</h1>
        <a href="{{ route('appointments.create') }}" style="background-color: #74af7a; border-color: #34ff21; color:black" class="btn btn-primary mb-3">Crear cita</a>
        @endcan
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div id="calendar"></div>
    </div>

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.min.js'></script> <!-- Include locale file -->

    <style>
        /* Cambiar el color de fondo y texto de los eventos */
        .fc-event:hover {
            background-color: #a4d6a0;
            color: #4d4d4d;
            border: 1px solid #0aa82f;
        }
        /* Cambio de color en el punto del evento*/
        .fc-daygrid-event-dot{
            border-color: #0aa82f;
        }
        .fc-day {
            background-color: #e8efea;
        }
        
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es', // Set the locale to Spanish
                events: @json($appointments),
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                dateClick: function(info) {
                    // handle date click
                },
                eventClick: function(info) {
                    if (info.event.url) {
                    window.location.href = info.event.url;
                    info.jsEvent.preventDefault(); 
                    }
}

            });

            calendar.render();
        });
    </script>
    <script src="scriptloader.js"></script>
</body>
</html>
@endsection
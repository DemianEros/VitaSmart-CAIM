<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VitaSmart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../EstilosLayDash/icons/mdi/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="../EstilosLayDash/css/style.css">
    <link rel="icon" type="image/x-icon" href="../EstilosWelcome/img/Icono.png" />
    <style>
        /* Estilos adicionales para anclar sidebar y navbar */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 999; /* Asegura que el sidebar esté sobre el contenido */
        }
        .navbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 250px; /* Ajustar según el ancho del sidebar */
            z-index: 1000; /* Asegura que la navbar esté sobre el contenido */
            transition: all 0.3s ease;
            background: #f1f1f3; /* Ajusta el fondo si es necesario */
            width: calc(100% - 250px); /* Ajusta el ancho si el sidebar está fijo */
        }
        #content {
            margin-left: 250px; /* Ajustar según el ancho del sidebar */
            padding-top: 70px; /* Ajustar según la altura del navbar */
            transition: all 0.3s ease;
        }
        .dropdown-menu {
            max-width: 300px;
            max-height: 300px;
            overflow-y: auto;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="{{ url('/') }}" class="ccInicio sidebar-link" style="display: inline; text-align: center; color: #CCB777; display: inline; margin-right: 5px; font-size: 25px; text-decoration: none; font-weight: bold; padding: 8px 15px; border-radius: 10px; transition: background-color 0.3s;">VITA-SMART</a>
            </div>

            <ul class="list-unstyled components">
                <li><a href="{{ url('/home') }}" class="sidebar-link">INICIO</a></li>
                <li><a href="{{ route('appointments.index') }}" class="sidebar-link">Generar Cita</a></li>
                <li>
                    <a href="#PacienteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pacientes</a>
                    <ul class="collapse list-unstyled" id="PacienteSubmenu">
                        <li><a href="{{ route('pacientes') }}" class="sidebar-link" >Buscar paciente</a></li>
                        <li><a href="{{ route('pacientes.create') }}" class="sidebar-link">Ingresar nuevo paciente</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#AdminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administrador</a>
                    <ul class="collapse list-unstyled" id="AdminSubmenu">
                        <li>
                            <a href="{{ route('admin') }}" class="sidebar-link">Panel de admin</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}" class="sidebar-link">Usuarios</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#BitacoraSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Bitacora</a>
                    <ul class="collapse list-unstyled" id="BitacoraSubmenu">

                        <li>
                            <a href="{{ route('bitacora') }}" class="sidebar-link">Bitácora de Expedientes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/contacto') }}" class="sidebar-link">Contacto</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <main>
                @yield('content')
                @yield('createsec')
                @yield('edit')
                @yield('paciente')
                @yield('editP')
            </main>
        </div>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-light rounded-circle">
                <i class="mdi mdi-menu mdi-24px"></i>
            </button>
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li style="padding-right: 10px;" class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary">Inicia Sesion</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-primary ml-4">Registrate</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle profile-navbar" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="https://icones.pro/wp-content/uploads/2021/02/symbole-masculin-icone-l-utilisateur-vert.png" class="img-fluid rounded-circle shadow" width="40">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li class="dropdown-item"><i class="mdi mdi-account mr-1"></i>{{ Auth::user()->email }}</li>
                            <li class="dropdown-item"><a href="#"><i class="mdi mdi-settings mr-1"></i>Ajustes</a></li>
                            <div class="dropdown-divider"></div>
                            <li class="dropdown-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                if ($('#sidebar').hasClass('active')) {
                    $('#sidebar').css('margin-left', '-250px');
                    $('.navbar').css('left', '0');
                    $('#content').css('margin-left', '0');
                } else {
                    $('#sidebar').css('margin-left', '0');
                    $('.navbar').css('left', '250px');
                    $('#content').css('margin-left', '250px');
                }
            });
        });
    </script>
</body>
</html>

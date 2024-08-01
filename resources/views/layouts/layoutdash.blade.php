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
                <li><a href="{{ route('appointments.index') }}" class="sidebar-link">Citas medicas</a></li>
                <li>
                    <a href="#PacienteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pacientes</a>
                    <ul class="collapse list-unstyled" id="PacienteSubmenu">
                        <li><a href="{{ route('pacientes') }}" class="sidebar-link">Buscar paciente</a></li>
                        @can('pacientes.create')
                        <li><a href="{{ route('pacientes.create') }}" class="sidebar-link">Ingresar nuevo paciente</a></li>
                        @endcan
                    </ul>
                </li>
                @role('Admin')
                <li>
                    <a href="#AdminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administrador</a>
                    <ul class="collapse list-unstyled" id="AdminSubmenu">

                        <li><a href="{{ route('admin') }}" class="sidebar-link">Panel de admin</a></li>
                        <li><a href="{{ route('admin.users') }}" class="sidebar-link">Usuarios</a></li>
                        <li><a href="{{ route('appointments.index') }}" class="sidebar-link">Citas</a></li>
                        <li><a href="{{ route('pacientes') }}" class="sidebar-link">Pacientes</a></li>

                    </ul>
                </li>
                @endrole
                @role('Admin|Administrativo')
                <li>
                    <a href="#BitacoraSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Bitacora</a>
                    <ul class="collapse list-unstyled" id="BitacoraSubmenu">

                        <li>
                            <a href="{{ route('bitacora') }}" class="sidebar-link">Bitácora de Expedientes</a>
                        </li>
                    </ul>
                </li>
                 @endrole
                <li>
                    <a href="{{ url('/contacto') }}" target="blank" class="sidebar-link">Contacto</a>
                </li>
                <li><br></li>
                <li><br></li>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <li>
                    <a href="#" class="sidebar-link" data-toggle="modal" data-target="#privacyModal">Aviso de Privacidad</a>
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
                            @role('Admin')
                            <li class="dropdown-item"><a href="{{ route('admin.users') }}"><i class="mdi mdi-settings mr-1"></i>Ajustes</a></li>
                            @endrole
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

    <!-- Modal de Aviso de Privacidad -->
<div class="modal fade" id="privacyModal" tabindex="-1" role="dialog" aria-labelledby="privacyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="privacyModalLabel">Aviso de Privacidad de VitaSmart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí puedes agregar tu aviso de privacidad -->
                <p>En VitaSmart, valoramos y respetamos tu privacidad. Estamos comprometidos con la protección y el manejo adecuado de tus datos personales conforme a las leyes y regulaciones aplicables en materia de protección de datos. Este aviso de privacidad detalla cómo recopilamos, utilizamos, almacenamos y protegemos la información personal que nos proporcionas al utilizar nuestros servicios.</p>
                <p>1. Recopilación de Datos Personales <br> Recopilamos únicamente los datos personales necesarios para ofrecerte nuestros servicios, los cuales pueden incluir tu nombre, dirección de correo electrónico, número de teléfono, información de pago, y otros detalles relevantes. Estos datos son recopilados de manera transparente y con tu consentimiento explícito.</p>
                <p>2. Uso de la Información <br> Utilizamos tus datos personales para los siguientes fines: <br> •	Proveer y mejorar nuestros productos y servicios. <br> •	Gestionar tu cuenta y personalizar tu experiencia. <br> •	Cumplir con nuestras obligaciones legales y regulatorias.</p>
                <p>3. Almacenamiento y Protección de Datos <br> Tus datos personales son almacenados en sistemas seguros que cumplen con los estándares de la industria para la protección de la información. Implementamos medidas de seguridad técnicas, organizativas y administrativas para evitar el acceso no autorizado, la divulgación, modificación o destrucción de tu información.</p>
                <p>4. Compartición de Información <br>No compartimos tus datos personales con terceros, salvo en los siguientes casos: <br>•	Con proveedores de servicios que actúan en nuestro nombre, bajo acuerdos de confidencialidad y únicamente para los fines mencionados en este aviso. <br>•	Cuando estemos obligados por ley a compartir tus datos con autoridades competentes. <br>•	Si consideramos que la divulgación es necesaria para proteger nuestros derechos, tu seguridad o la seguridad de otros.</p>
                <p>5. Derechos del Usuario <br>Tienes el derecho de acceder, rectificar, cancelar u oponerte al tratamiento de tus datos personales. Para ejercer estos derechos o si tienes alguna pregunta o inquietud sobre cómo manejamos tus datos, puedes contactarnos a través de [idyworld2024@gmail.com]. </p>
                <p>6. Cambios en el Aviso de Privacidad <br>Este aviso de privacidad puede ser actualizado para reflejar cambios en nuestras prácticas de manejo de datos. Te notificaremos sobre cualquier cambio significativo y te proporcionaremos la versión actualizada en nuestra página web.</p>
                <p>Al utilizar nuestros servicios, confirmas que has leído y aceptado las prácticas descritas en este aviso de privacidad. Si tienes alguna pregunta o inquietud sobre el manejo de tus datos personales, por favor, contáctanos en cualquier momento.</p>
                <!-- Puedes agregar más contenido según sea necesario -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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

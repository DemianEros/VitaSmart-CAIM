<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>VitaSmart</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="EstilosLayDash/icons/mdi/materialdesignicons.min.css">
	<link rel="stylesheet" type="text/css" href="EstilosLayDash/css/style.css">
	<link rel="icon" type="image/x-icon" href="EstilosWelcome/img/Icono.png" />
</head>
<body>
	<div class="wrapper">
		<!-- Sidebar -->
	    <nav id="sidebar">
	        <div class="sidebar-header">
				<a href="{{ url('/') }}" class="ccInicio" style="display: inline; text-align: center; color: #CCB777; display: inline; margin-right: 5px;font-size: 25px; text-decoration: none; font-weight: bold; padding: 8px 15px; border-radius: 10px; transition: background-color 0.3s;">VITA-SMART</a>
	        </div>

	        <ul class="list-unstyled components">
				<li>
				<a href="{{ url('/home') }}">INICIO</a>
				</li>
	            <li>
	                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Modulo Citas</a>
	                <ul class="collapse list-unstyled" id="homeSubmenu">
	                    <li>
	                        <a href="{{ route('appointments.index') }}">Generar Cita</a>
	                    </li>
	                    <li>
	                        <a href="#">Eliminar Cita</a>
	                    </li>
	                    <li>
	                        <a href="#">Calendario de Citas</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Folios Clinicos</a>
	                <ul class="collapse list-unstyled" id="pageSubmenu">
	                    <li>
	                        <a href="#">Crear Folio</a>
	                    </li>
	                    <li>
	                        <a href="#">Administracion de Folios</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Usuarios</a>
	                <ul class="collapse list-unstyled" id="pageSubmenu">
	                    <li>
	                        <a href="#">Crear Usuario</a>
	                    </li>
	                    <li>
	                        <a href="#">Editar Usuario</a>
	                    </li>
	                    <li>
	                        <a href="#">Eliminar Usuario</a>
	                    </li>
	                </ul>
	            </li>
	            <li>
	                <a href="#">Contacto</a>
	            </li>
	        </ul>
	    </nav>

	    <!-- Page Content -->
	    <div id="content">
	    	<!-- navbar -->
	    	<nav class="navbar navbar-expand-lg navbar-light" style="background: #f1f1f3;">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-light rounded-circle" style="border: 2px solid #e1e1e1;">
                        <i class="mdi mdi-menu mdi-24px"></i>
                    </button>

                    <!--<ul class="nav navbar-nav ml-auto">
                    	<li>
				          <a href="#" class="dropdown-toggle profile-navbar" data-toggle="dropdown" role="button" aria-expanded="false">
				          	<img src="https://avatars1.githubusercontent.com/u/49246221?s=60&u=1c235446e9abad64a002c82ec494f93d290110ff&v=4" class="img-fluid rounded-circle shadow" width="40">
				          	{{ Auth::user()->name }}
				          </a>
				          <ul class="dropdown-menu" role="menu">
				            <li class="dropdown-item"><a href="#"><i class="mdi mdi-account mr-1"></i>Mi perfil</a></li>
				            <li class="dropdown-item"><a href="#"><i class="mdi mdi-settings mr-1"></i>Ajustes</a></li>
				            <div class="dropdown-divider"></div>
				            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
							
				          </ul>
				        </li>
                    </ul>-->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li style="padding-right: 10px;" class="nav-item">
                                <a href="{{ route('login') }}" style="background-color: #74af7a; border-color: #1dfd0dda;" class="btn btn-primary font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inicia Sesion</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                <a href="{{ route('register') }}" style="background-color: #74af7a; border-color: #1dfd0dda; " class="btn btn-primary ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrate</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
								<a href="#" class="dropdown-toggle profile-navbar" data-toggle="dropdown" role="button" aria-expanded="false">
				          			<img src="https://avatars1.githubusercontent.com/u/49246221?s=60&u=1c235446e9abad64a002c82ec494f93d290110ff&v=4" class="img-fluid rounded-circle shadow" width="40">
				          			{{ Auth::user()->name }}
				          		</a>

								  <ul class="dropdown-menu" role="menu">
				            <li class="dropdown-item"><a href="#"><i class="mdi mdi-account mr-1"></i>Mi perfil</a></li>
				            <li class="dropdown-item"><a href="#"><i class="mdi mdi-settings mr-1"></i>Ajustes</a></li>
				            <div class="dropdown-divider"></div>
				            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
							
				          </ul>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
			<main>
			@yield('content')
			</main>
	    </div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>
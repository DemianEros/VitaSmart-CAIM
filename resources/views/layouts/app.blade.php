<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VitaSmart</title>
    <link rel="icon" type="image/x-icon" href="EstilosWelcome/img/Icono.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="EstilosLayout/css/styles.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        #app {
            position: relative;
            z-index: 1;
        }

        nav, footer {
            position: relative;
            z-index: 2;
        }

        main {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
<video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="EstilosWelcome/mp4/bg6.mp4" type="video/mp4" /></video>
    <div id="app">
        <nav style="background-color: #0c5b39;" class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a href="{{ url('/') }}" class="ccInicio" style="display: inline; text-align: center; color: #CCB777; display: inline; margin-right: 50px;font-size: 25px; text-decoration: none; font-weight: bold; padding: 8px 15px; border-radius: 10px; transition: background-color 0.3s;"><img src="IconoVita.ico" style="width: 80px; height: auto;"alt="LOGO">VITA-SMART</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
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
                                <a id="navbarDropdown" style="color: #2FF925;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 bgc">
            @yield('content')
        </main>
    </div>

    <footer style="position: absolute; bottom: 0; width: 100%; height: 100px; background-color: #0c5b39; color: #fff; padding: 20px; display: flex; justify-content: space-between; align-items: center;">
    <div style="display: flex; align-items: center;">
        <p style="margin: 0;"><i class="fas fa-copyright"></i> Todos los derechos reservados 2024</p>
    </div>
    <div style="margin-left: 20px;">
        <nav>
            <ul style="list-style: none; margin: 0; padding: 0;">
                <li style="display: inline; margin-right: 10px;"><a class="ccl" style="color: #fff; text-decoration: none; padding: 8px 15px;" href="{{ route ('idyhome')}}" target="_blank">CONOCENOS</a></li>
                <li style="display: inline; margin-right: 0px;"><a class="ccl" style="color: #fff; text-decoration: none; padding: 8px 15px;" href="{{ route ('contacto')}}" target="_blank">CONTACTANOS</a></li>
            </ul>
        </nav>
    </div>
    <div style="font-size: 24px;">
        <img style="height: 80px" src="IconoIDY.ico" alt="Ícono Personalizado"><span style="display: inline; text-align: center; color: #CCB777; display: inline; margin-right: 50px;font-size: 25px; text-decoration: none; font-weight: bold; padding: 8px 15px; border-radius: 10px; transition: background-color 0.3s;">IDY World</span>
    </div>
</footer>

</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Sena_Colombia_logo.svg/640px-Sena_Colombia_logo.svg.png">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/styles1.css')}}">
    @role('Instructor')<link rel="stylesheet" href="{{asset('assets/css/stylesNotas.css')}}">@endrole
    @role('Admin')<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesUnico.css') }}">@endrole
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <header class="main-header">
            <label for="btn-nav" class="btn-nav"><i class="fas fa-bars"></i>
            </label>
            <input type="checkbox" name="" id="btn-nav">

            <nav>
                <ul class="navigation">
                    <li><a href="{{route('home')}}">Inicio</a></li>
                    @role('Admin')
                    <li><a href="{{route('asistencias.index')}}">Asistencias</a></li>
                    <li><a href="{{route('events.index')}}">Eventos</a></li>
                    <li><a href="{{route('aprendiz.index')}}">Aprendices</a></li>
                    <li><a href="{{route('competencias.index')}}">Competencias</a></li>
                    <li><a href="{{route('fichas.index')}}">Fichas</a></li>
                    <li><a href="{{route('instructores.index')}}">Instructores</a></li>
                    @endrole
                    @role('Instructor')
                    <li><a href="{{route('events.index')}}">Eventos</a></li>
                    <li><a href="{{route('asistencias.index')}}">Asistencias</a></li>
                    <li><a href="{{route('notas.index')}}">Notas</a></li>
                    @endrole
                    @role('Aprendiz')
                    <li><a href="{{route('encuesta.index')}}">Encuesta</a></li>
                    @endrole
                    <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>

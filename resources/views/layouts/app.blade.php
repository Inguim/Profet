<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 20px;
        background-color: #086BAB;

    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Profet') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md" style="background: #086BAB;">

            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="logo3.png" style="height: 50px;">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Categorias</a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('agrarias') }}">Ciências Agrárias</a>
                                <a class="dropdown-item" href="{{ route('biologicas') }}">Ciências Biológicas</a>
                                <a class="dropdown-item" href="{{ route('saude') }}">Ciências da Saúde</a>
                                <a class="dropdown-item" href="{{ route('exatas') }}">Ciências Exatas e da Terra</a>
                                <a class="dropdown-item" href="{{ route('humanas') }}">Ciências Humanas</a>
                                <a class="dropdown-item" href="{{ route('sociais') }}">Ciências Sociais Aplicadas</a>
                                <a class="dropdown-item" href="{{ route('engenharias') }}">Engenharias</a>
                                <a class="dropdown-item" href="{{ route('letras') }}">Linguística, Letras e Artes</a>
                                <a class="dropdown-item" href="{{ route('multi') }}">Multidisciplinar</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ajuda') }}">Ajuda</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registre-se') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('novoprojeto') }}">{{ __('Novo Projeto') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('perfil') }}">{{ __('Perfil') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        </nav>
        <main>
            @yield('content')
        </main>
    </div>
    </div>
    <div class="footer">
        <p></p>
    </div>
</body>

</html>

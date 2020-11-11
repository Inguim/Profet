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
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="logo3.png" style="height: 50px;">
                </a>
                <a class="nav-link" href="#">Inicio</a><br>
                <div class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false" v-pre>Categorias</a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Ciências Agrárias</a>
                        <a class="dropdown-item" href="#">Ciências Biológicas</a>
                        <a class="dropdown-item" href="#">Ciências da Saúde</a>
                        <a class="dropdown-item" href="#">Ciências Exatas e da Terra</a>
                        <a class="dropdown-item" href="#">Ciências Humanas</a>
                        <a class="dropdown-item" href="#">Ciências Sociais Aplicadas</a>
                        <a class="dropdown-item" href="#">Engenharias</a>
                        <a class="dropdown-item" href="#">Linguística, Letras e Artes</a>
                        <a class="dropdown-item" href="#">Multidisciplinar</a>
                    </div>
                </div>
                <a class="nav-link" href="#">Ajuda</a><br>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            <main>
                 @yield('content')
            </main>
        </div>
    </div>
    <div class="footer"><p></p></div>
</body>
</html>

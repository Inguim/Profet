<nav class="navbar navbar-expand-lg navbar-dark" style="background: #086BAB;">

    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('logo3.png') }}" style="height: 50px;">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    @inject('resources','App\Services\ResourcesService')
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            @foreach($resources->menus() as $menu)
                @if($menu->categorias->count() == 0)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url($menu->url) }}">{{ $menu->nome }}</a>
                </li>
                @else
                <li class="nav-item">
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ $menu->nome }}</a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            @foreach($menu->categorias as $categoria)
                            <a class="dropdown-item" href="{{ route('categoria.show', $categoria->slug) }}">{{ $categoria->nome }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @endif
            @endforeach
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->

            <li class="nav-item">
                <form class="form-inline align-self-center mt-1 mr-2 bg-light" action="{{ route('searchProjeto') }}">
                    @method('GET')
                    <input class="form-control-sm border-0 rounded-0" name="search" type="text" placeholder="Estudo de células...">
                    <button class="btn btn-success btn-sm rounded-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
            </li>
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
                    <a class="dropdown-item" href="{{ route('usuario.show', Auth::user()->id) }}">{{ __('Perfil') }}</a>
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

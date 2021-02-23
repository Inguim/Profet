<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   right: 0;
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
        @component("components.navbar")
        @endcomponent
        @inject('resources','App\Services\ResourcesService')
        <div class="row">
            <article class="col-2" >
                <div class="pt-2" id="noticias" style="margin-left: 5px">
                    <h4 class=" text-center text-dark" style="margin-top:10px">Notícias</h4>
                    <div id="noticias">
                    @foreach($resources->noticias() as $noticia)
                        <div class="card mb-1">
                            <a class="card-link p-2" href="{{ $noticia->link }}">{{ $noticia->nome }}</a>
                        </div>
                    @endforeach
                <div>
            </article>
                 @yield('content')
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>

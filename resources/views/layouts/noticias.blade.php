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
        <div class="row">
            <article class="col-2" >
                <div class="pt-2" id="noticias" style="margin-left: 5px">
                    <h4 class=" text-center text-dark" style="margin-top:10px">Notícias</h4>
                    <div id="noticias">
                        <div class="card mb-1">
                            <a class="card-link p-2" href="http://www.varginha.cefetmg.br/2019/08/19/inscricoes-para-a-15a-semana-ct-prorrogadas-ate-quarta-21/"> Inscrições para a 15ª Semana C&T prorrogadas até quarta (21) </a>
                        </div>
                        <div class="card mb-1">
                            <a class="card-link p-2" href="http://www.meta.cefetmg.br/2019/06/03/esta-aberto-o-periodo-de-inscricoes-de-trabalhos-para-a-29a-meta/"> Está aberto o período de inscrições de trabalhos para a 29ª META </a>
                        </div>
                        <div class="card mb-1">
                            <a class="card-link p-2 p-1" href="http://www.meta.cefetmg.br/2019/05/31/divulgado-o-edital-da-29a-mostra-especifica-de-trabalhos-e-aplicacoes-meta-do-cefet-mg/"> Divulgado o Edital da 29ª Mostra Específica de Trabalhos e Aplicações (META) do CEFET-MG </a>
                        </div>
                        <div class="card mb-1">
                            <a class="card-link p-2 p-1" href="http://www.varginha.cefetmg.br/2019/08/23/semana-ct-recebe-propostas-de-coordenacoes-e-departamentos/"> Semana C&T recebe propostas de coordenações e departamentos </a>
                        </div>
                        <div class="card mb-1">
                            <a class="card-link p-2 p-1" href="http://www.semanact.cefetmg.br/2019/09/13/trabalhos-aprovados-para-apresentacao-na-15a-semana-ct/"> Trabalhos aprovados para apresentação na 15ª Semana C&T </a>
                        </div>
                        <div class="card mb-1">
                            <a class="card-link p-2 p-1" href="http://www.semanact.cefetmg.br/2019/10/09/disponivel-programacao-da-15a-semana-ct/"> Disponível Programação da 15ª Semana C&T </a>
                        </div>
                    </div>
                <div>
            </article>
                 @yield('content')
        </div>
    </div>
    <div class="footer"><p></p></div>
</body>
</html>

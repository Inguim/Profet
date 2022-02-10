@extends('layouts.app')

@section('content')


<section class="col-12 mt-2 mb-2 bg-light shadow" data-spy="scroll" data-target=".navbar" data-offset="50" style="max-width: 100vw;">
    <nav class="navbar navbar-expand-md bg-light navbar-light justify-content-center" id="nvsect">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#area1">O que é?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#area2">Projetos recentes </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#area3">Projetos concluídos </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#area4">Todos os Projetos </a>
            </li>
        </ul>
    </nav>
    <div id="area1" class="container-fluid text-center border-bottom border-dark">
        <h4> O que são as {{ $categoria[0]->nome }}? </h4>
        <p class="text-center">{{ $categoria[0]->descricao }}</p>
    </div>
    <div id="categoria-react-area" style="max-width: 100vw;">

    </div>
</section>

@endsection

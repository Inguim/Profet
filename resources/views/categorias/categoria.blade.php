@extends('layouts.app')

@section('content')


<section class="col-12 mt-2 mb-2 bg-light shadow" data-spy="scroll" data-target=".navbar" data-offset="50">
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
    <div id="area2" class="container-fluid text-center border-bottom border-dark">
        <h4 class="mb-2 text-left"> Projetos Recentes </h4>
        @foreach($projetos as $projeto)
        <div class="d-flex flex-wrap justify-content-center">
            <div class="card" id="card1">
                <div class="card-body">
                    <h4 class="card-title">{{$projeto->nome}}</h5></h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
        @endforeach
            <div class="card" id="card2">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 2</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card3">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 3</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card1">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 1</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card2">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 2</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
        </div>
        <a href="">Ver mais</a>
    </div>
    <div id="area3" class="container-fluid text-center border-bottom border-dark">
        <h4 class="mb-2 text-left">Projetos concluídos</h4>
        <div class="d-flex flex-wrap justify-content-center">
            <div class="card" id="card1">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 1</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card2">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 2</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card3">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 3</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card1">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 1</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card2">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 2</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
        </div>
        <a href="">Ver mais</a>
    </div>
    <div id="area4" class="container-fluid text-center border-bottom" style="margin-bottom: 50px">
        <h4 class="mb-2 text-left">Todos os projetos</h4>
        <div class="d-flex flex-wrap justify-content-center">
            <div class="card" id="card1">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 1</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card2">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 2</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card3">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 3</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card1">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 1</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
            <div class="card" id="card2">
                <div class="card-body">
                    <h4 class="card-title"> Projeto 2</h4>
                    <p class="card-text"> Esse projeto é voltado para...</p>
                    <a href="#" class="card-link"> Ler projeto </a>
                </div>
            </div>
        </div>
        <a href="">Ver mais</a>
    </div>
</section>

@endsection

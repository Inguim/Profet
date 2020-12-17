@extends('layouts.app')

@section('content')

<section class="col-12 mt-2 mb-2 bg-light shadow" data-spy="scroll" data-target=".navbar" data-offset="50">
            <nav class="navbar navbar-expand-md bg-light navbar-light justify-content-center" id="nvsect">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#area1"> O que é?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#area2"> Projetos recentes </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#area3"> Projetos concluídos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#area4"> Todos os Projetos </a>
                    </li>
                </ul>
            </nav>
            <div id="area1" class="container-fluid text-center border-bottom border-dark">
                <h4> O que são as Ciências Agrárias? </h4>
                <p class="style: text-justify"> É a área que visa a busca do aprimoramento técnico,
                    o aumento produtivo e melhorias no manejo e preservação dos recursos naturais,
                    sendo os seus profissionais capazes de propor soluções através do entendimento de produção
                    agropecuária,
                    comercialização dos produtos e preservação ambiental. Não levando em conta o desenvolvimento
                    de projetos, que seria basicamente o desenvolvimento de técnicas de melhorias dentro e fora do
                    campus,
                    seja na correção de um solo ou formas alternativas de produzir algo de origem animal ou vegetal.
                </p>
            </div>
            <div id="area2" class="container-fluid text-center border-bottom border-dark">
                <h4 class="mb-2 text-left"> Projetos Recentes </h4>
                <div class="row">
                    <div class="card col-2" id="card1">
                        <div class="card-body">
                            <h4 class="card-title"> Projeto 1</h4>
                            <p class="card-text"> Esse projeto é voltado para...</p>
                            <a href="#" class="card-link"> Ler projeto </a>
                        </div>
                    </div>
                    <div class="card col-2" id="card2">
                        <div class="card-body">
                            <h4 class="card-title"> Projeto 2</h4>
                            <p class="card-text"> Esse projeto é voltado para...</p>
                            <a href="#" class="card-link"> Ler projeto </a>
                        </div>
                    </div>
                    <div class="card col-2" id="card3">
                        <div class="card-body">
                            <h4 class="card-title"> Projeto 3</h4>
                            <p class="card-text"> Esse projeto é voltado para...</p>
                            <a href="#" class="card-link"> Ler projeto </a>
                        </div>
                    </div>
                </div>
                <a href=""> Ver mais</a>
            </div>
            <div id="area3" class="container-fluid text-center border-bottom border-dark">
                <h4 class="mb-2 text-left">Projetos concluídos</h4>
                <div class="row">
                    <div class="card col-2" id="card1">
                        <div class="card-body">
                            <h4 class="card-title"> Projeto 1</h4>
                            <p class="card-text"> Esse projeto é voltado para...</p>
                            <a href="#" class="card-link"> Ler projeto </a>
                        </div>
                    </div>
                    <div class="card col-2" id="card2">
                        <div class="card-body">
                            <h4 class="card-title"> Projeto 2</h4>
                            <p class="card-text"> Esse projeto é voltado para...</p>
                            <a href="#" class="card-link"> Ler projeto </a>
                        </div>
                    </div>
                    <div class="card col-2" id="card3">
                        <div class="card-body">
                            <h4 class="card-title"> Projeto 3</h4>
                            <p class="card-text"> Esse projeto é voltado para...</p>
                            <a href="#" class="card-link"> Ler projeto </a>
                        </div>
                    </div>
                </div>
                <a href=""> Ver mais</a>
            </div>
            <div id="area4" class="container-fluid text-center border-bottom" style="margin-bottom: 50px">
                <h4 class="mb-2 text-left">Todos os projetos</h4>
                <div class="row">
                    <div class="card col-2" id="card1">
                        <div class="card-body">
                            <h4 class="card-title"> Projeto 1</h4>
                            <p class="card-text"> Esse projeto é voltado para...</p>
                            <a href="#" class="card-link"> Ler projeto </a>
                        </div>
                    </div>
                    <div class="card col-2" id="card2">
                        <div class="card-body">
                            <h4 class="card-title"> Projeto 2</h4>
                            <p class="card-text"> Esse projeto é voltado para...</p>
                            <a href="#" class="card-link"> Ler projeto </a>
                        </div>
                    </div>
                    <div class="card col-2" id="card3">
                        <div class="card-body">
                            <h4 class="card-title"> Projeto 3</h4>
                            <p class="card-text"> Esse projeto é voltado para...</p>
                            <a href="#" class="card-link"> Ler projeto </a>
                        </div>
                    </div>
                </div>
                <a href=""> Ver mais</a>
            </div>
        </section>

@endsection

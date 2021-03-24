@extends('layouts.noticias')

@section('content')

<style>
    .item-card-text {
        margin-bottom: 5px;
    }
</style>
<section class="col-10 bg-light shadow" data-spy="scroll" data-target=".navbar" data-offset="50">
    @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session()->get('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <nav class="navbar navbar-expand-md bg-light navbar-light justify-content-center" id="nvsect">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#area1">Bem vindo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#area2">Novos Projetos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#area3">Comece já</a>
            </li>
        </ul>
    </nav>
    <div id="bemvindo" class="container-fluid text-center border-bottom border-dark centro">
        <h1>BEM VINDOS AO PROFET</h1>
    </div>
    <div class="container-fluid border-bottom border-dark centro">
        <h2 class="mb-2 text-center pt-1">Novos Projetos</h2>
        <div class="d-flex flex-column border-bottom pt-4">
            <h5>PROFET: SISTEMA WEB PARA GESTÃO E COMPARTILHAMENTO DE INICIATIVAS INOVADORAS NO CEFET‐MG UNIDADE VARGINHA</h5>
            <p class="item-card-text">Orientador: Lázaro Eduardo da Silvaa</p>
            <p class="item-card-text">Área de Atuação: Ciências Exatas e da Terra</p>
            <p class="item-card-text">Autores: Igor Azevedo Santos, Gabriella Mantovani, Wasleny Pimenta</p>
            <p class="item-card-text">Data de adesão: 00/00/00</p>
            <p class="item-card-text">Estado Atual: Prototipação</p>
            <p class="item-card-text">Resumo: Propomos a criação de uma plataforma que hospede tais projetos, em desenvolvimento ou concluídos, e permite comentários em relação aos projetos, além de noticiar a busca dos professores ou alunos por orientandos e orientadores, respectivamente.</p>
            <a href="" class="pb-1">Saiba mais</a>
        </div>
    </div>
    <div class="container-fluid text-center centro" style="margin-bottom: 20px">
        <h2 class="mb-2 text-center pt-1">Comece já</h2>
        <p>Está querendo iniciar um projeto, ou está em busca de algum para orientar ou participar?</p>
        <a href="{{ route('ajuda') }}">Comece aqui</a>
    </div>
</section>

@endsection

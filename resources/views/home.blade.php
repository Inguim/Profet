@extends('layouts.noticias')

@section('content')

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
        <h2 class="mb-2 text-center">Novos Projetos</h2>
        <div class="row border-bottom">
            <h5>PROFET: SISTEMA WEB PARA GESTÃO E COMPARTILHAMENTO DE INICIATIVAS INOVADORAS NO CEFET‐MG UNIDADE VARGINHA</h5>
            <p>Orientador: Lázaro Eduardo da Silva</p>
            <p>Área de Atuação: Ciências Exatas e da Terra</p>
            <p>Autores: Igor Azevedo Santos, Gabriella Mantovani, Wasleny Pimenta</p>
            <p>Data de adesão: 00/00/00</p>
            <p>Estado Atual: Prototipação</p>
            <p>Resumo: Propomos a criação de uma plataforma que hospede tais projetos, em desenvolvimento ou concluídos, e permite comentários em relação aos projetos, além de noticiar a busca dos professores ou alunos por orientandos e orientadores, respectivamente.</p>
            <a href="">Saiba mais</a>
        </div>
        <div class="row border-bottom pt-4">
            <h5>INLINE: ENTRE ERAS</h5>
            <p>Orientador: Marcelo Corrêa Mussel</p>
            <p>Área de Atuação: Ciências Exatas e da Terra</p>
            <p>Autores: Bruna Castilho, Wasleny Pimenta</p>
            <p>Data de adesão: 00/00/00</p>
            <p>Estado Atual: Prototipação</p>
            <p>Resumo: Inline: entre eras é um jogo voltado a educação, abrangendo as áreas de história, filosofia e literatura. Como estudantes do curso de informática, queríamos um projeto relacionado a esse ramo.</p>
            <a href="projetoex.html">Saiba mais</a>
        </div>
    </div>
    <div class="container-fluid text-center centro" style="margin-bottom: 20px">
        <h2 class="mb-2 text-center">Comece já</h2>
        <p>Está querendo iniciar um projeto, ou está em busca de algum para orientar ou participar?</p>
        <a href="{{ route('ajuda') }}">Comece aqui</a>
    </div>
</section>

@endsection

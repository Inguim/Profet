@extends('layouts.noticias')

@section('content')

<style>
  .item-card-text {
    margin-bottom: 5px;
  }

  @media(max-width: 768px) {
    .col-s-2 {
      padding-right: 0 !important;
    }
  }
</style>
<section class="col-md-10 bg-light shadow col-s-2" data-spy="scroll" data-target=".navbar" data-offset="50">
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
    @if($projetos->count() > 0 )
    @foreach($projetos as $projeto)
    <div class="d-flex flex-column border-bottom pt-4">
      <h5>{{$projeto->nome}}</h5>
      <p class="item-card-text">Orientador:
        @foreach($projeto->userProjs as $users)
        @if($users->relacao === "orientador")
        {{ $users->user->name }}
        @endif
        @endforeach
      </p>
      <p class="item-card-text">Área de Atuação: {{ $projeto->categoria->nome }}</p>
      <p class="item-card-text">Autores:
        @foreach($projeto->userProjs as $users)
        @if($users->relacao === "bolsista" || $users->relacao === "voluntario")
        @if($loop->last)
        {{ $users->user->name }}
        @else
        {{ $users->user->name }},
        @endif
        @endif
        @endforeach
      </p>
      <p class="item-card-text">Data de adesão: {{ $projeto->created_at->format('d/m/Y') }}</p>
      <p class="item-card-text">Estado Atual: {{ $projeto->estado->estado }}</p>
      <p class="item-card-text" style="text-align: justify">Resumo: {{ $projeto->resumo }}</p>
      <a href="{{ route('visualizarProjeto', $projeto->id)}}" class="pb-1">Saiba mais</a>
    </div>
    @endforeach
    @else
    <p class="text-center mb-0">Ainda não há nenhum projeto na plataforma 🙈</p>
    <p class="text-center">Seja o primeiro clickando <a href="{{ route('novoprojeto') }}">aqui</a> !!. Ou caso ainda não tenha se cadastrado na plataforma, cadastre-se por <a href="{{ route('register') }}">aqui</a></p>
    @endif
  </div>
  <div class="container-fluid text-center centro" style="margin-bottom: 20px">
    <h2 class="mb-2 text-center pt-1">Comece já</h2>
    <p>Está querendo iniciar um projeto, ou está em busca de algum para orientar ou participar?</p>
    <a href="{{ route('ajuda') }}">Comece aqui</a>
  </div>
</section>

@endsection

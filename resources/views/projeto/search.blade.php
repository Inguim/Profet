@extends('layouts.app')

@section('content')

<section class="container my-4">
    @forelse($projetos as $projeto)
        <div class="card-columns">
            <div class="card">
                <h4 class="card-header text-center">{{ $projeto->nome }}</h4>
                <div class="card-body">
                    <h6 class="card-subtitle  mb-2" style="text-align: justify" >{{ $projeto->resumo }}</h6>
                    <p class="card-text font-weight-light text-muted m-0">Categora: {{ $projeto->categoria->nome }}</p>
                    <p class="card-text font-weight-light text-muted mb-2">Estado atual: {{ $projeto->estado->estado }}</p>
                    <a href="{{ route('visualizarProjeto', $projeto->id)}}" class="card-link">Saiba mais</a>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-danger  alert-dismissible fade show" role="alert">
            <strong>Ops!</strong> Não encontramos nenhum projeto com esse nome.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforelse
</section>
@endsection

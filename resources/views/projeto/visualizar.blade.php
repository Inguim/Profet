@extends('layouts.app')

@section('content')

<section class="container rounded-lg shadow my-3 p-3 border border-white">
    <div class="d-flex align-items-center">
        <h2 class="font-weight-bold m-0" style="text-align: center">{{ $projeto->nome }}</h2>
        <a class="btn btn-outline-primary ml-auto" href="{{ route('projetoPDF', $projeto->id) }}">Gerar pdf</a>
    </div>
    <div class="my-3">
        @foreach($projeto->userProjs as $membro)
            @switch($membro->relacao)
                @case("orientador")
                    <p class="font-weight-bold m-0">Orientador:
                        <a class="font-weight-normal" href="{{ route('usuario.show', $membro->user->id) }}">{{ $membro->user->name }}</a>
                    </p>
                    @break
                @case("coorientador")
                    <p class="font-weight-bold m-0">Coorientador:
                        <a class="font-weight-normal" href="{{ route('usuario.show', $membro->user->id) }}">{{ $membro->user->name }}</a>
                    </p>
                    @break
                @case("coordenador")
                    <p class="font-weight-bold m-0">Coordenador:
                        <a class="font-weight-normal" href="{{ route('usuario.show', $membro->user->id) }}">{{ $membro->user->name }}</a>
                    </p>
                    @break
            @endswitch
        @endforeach
        <p class="font-weight-bold m-0">Autores:
            <span class="font-weight-normal">
            @foreach($projeto->userProjs as $membro)
                @if($membro->relacao === "bolsista" || $membro->relacao === "voluntario")
                    <a class="font-weight-normal" href="{{ route('usuario.show', $membro->user->id) }}">
                        @if($loop->first)
                            {{ $membro->user->name }}
                        @else
                            , {{ $membro->user->name }}
                        @endif
                    </a>
                @endif
            @endforeach
            </span>
        </p>
        <p class="font-weight-bold m-0">Área de Atuação:
            <a class="font-weight-normal" href="{{ route('categoria.show', $projeto->categoria->slug) }}">{{ $projeto->categoria->nome }}</a>
        </p>
        <p class="font-weight-bold m-0">Estado Atual:
            <span class="font-weight-normal">{{ $projeto->estado->estado }}</span>
        </p>
        <p class="font-weight-bold m-0">Data de adesão:
            <span class="font-weight-normal">{{ $projeto->created_at->format('d/m/Y') }}</span>
        </p>
    </div>
    <div class="mt-2">
        <h4 class="font-weight-bold mb-0" class="font-weight-bold" >Resumo:</h4>
        <p style="text-align: justify">{{ $projeto->resumo }}</p>
    </div>
    <div class="mt-2">
        <h4 class="font-weight-bold mb-0">Introdução:</h4>
        <p style="text-align: justify">{{ $projeto->introducao }}</p>
    </div>
    <div class="mt-2">
        <h4 class="font-weight-bold mb-0">Objetivo:</h4>
        <p style="text-align: justify">{{ $projeto->objetivo }}</p>
    </div>
    <div class="mt-2">
        <h4 class="font-weight-bold mb-0">Metodologia:</h4>
        <p style="text-align: justify">{{ $projeto->metodologia }}</p>
    </div>
    <div class="mt-2">
        <h4 class="font-weight-bold mb-0">Resultados e discussões:</h4>
        <p style="text-align: justify">{{ $projeto->result_disc }}</p>
    </div>
    <div class="mt-2">
        <h4 class="font-weight-bold mb-0">Conclusão:</h4>
        <p style="text-align: justify">{{ $projeto->conclusao }}</p>
    </div>
</section>
@endsection

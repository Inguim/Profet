@extends('layouts.app')

@section('content')

<div class="container d-flex flex-column align-items-center justify-content-center my-3 p-3" style="height:  70vh;">
  <div class="card text-center w-50 py-2">
    <div class="card-headerd d-flex flex-column text-left w-100 px-2 border-bottom">
      <small>{{ $solicitacao->updated_at_ago }}</small>
      <h4>{{ $solicitacao->titulo }}</h4>
    </div>
    <div class="card-body text-left">
      <p class="card-text mb-4  ">{{ $solicitacao->descricao }}</p>
      <div class="d-flex justify-content-between align-items-end">
        @if($solicitacao->status == 'aguardando')
        <a href="{{ route('editProjeto', [$solicitacao->projeto->id, $solicitacao->id]) }}" class="card-link">{{ __('Alterar') }}
          @else
          <a href="#" class="card-link">
            @endif
          </a>
          @switch($solicitacao->status)
          @case('recusado')
          <span class="badge badge-danger text-capitalize pt-1" style="max-height: 20px;">{{ $solicitacao->status }}</span>
          @break
          @case('aguardando')
          <span class="badge badge-warning pt-1" style="max-height: 20px;">{{ ucwords($solicitacao->status) }}{{ __(' alteração') }}</span>
          @break
          @case('alterado')
          <span class="badge badge-info text-capitalize pt-1" style="max-height: 20px;">{{ $solicitacao->status }}</span>
          @break
          @case('aprovado')
          <span class="badge badge-success text-capitalize pt-1" style="max-height: 20px;">{{ $solicitacao->status }}</span>
          @break
          @endswitch
          <a href="{{ route('home') }}" class="card-link">Voltar</a>
      </div>
    </div>
  </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<form method="POST" class="container d-flex flex-column rounded-lg shadow my-3 p-3 border border-white bg-light" action="{{ route('updateProjeto', $projeto->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nome" class="form-label text-md-right">Nome:</label>

        <div class="">
            <input id="nome" type="nome" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $projeto->nome }}" required autocomplete="nome" autofocus>

            @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="resumo" class="form-label text-md-right">Resumo:</label>

        <div class="">
            <textarea id="resumo" type="resumo" class="form-control @error('resumo') is-invalid @enderror" name="resumo" required autocomplete="resumo" autofocus>{{ $projeto->resumo }}</textarea>

            @error('resumo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="introducao" class="form-label text-md-right">Introducao:</label>

        <div class="">
            <textarea id="introducao" type="introducao" class="form-control @error('introducao') is-invalid @enderror" name="introducao" required autocomplete="introducao" autofocus>{{ $projeto->introducao }}</textarea>

            @error('introducao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="objetivo" class="form-label text-md-right">Objetivos:</label>

        <div class="">
            <textarea id="objetivo" type="objetivo" class="form-control @error('objetivo') is-invalid @enderror" name="objetivo" required autocomplete="objetivo" autofocus>{{ $projeto->objetivo }}</textarea>

            @error('objetivo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="metodologia" class="form-label text-md-right">Metodologia:</label>

        <div class="">
            <textarea id="metodologia" type="metodologia" class="form-control @error('metodologia') is-invalid @enderror" name="metodologia" required autocomplete="metodologia" autofocus>{{ $projeto->metodologia }}</textarea>

            @error('metodologia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="result_disc" class="form-label text-md-right">Resultados e discussões:</label>

        <div class="">
            <textarea id="result_disc" type="result_disc" class="form-control @error('result_disc') is-invalid @enderror" name="result_disc" required autocomplete="result_disc" autofocus>{{ $projeto->result_disc }}</textarea>

            @error('result_disc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="conclusao" class="form-label text-md-right">Conclusao:</label>

        <div class="">
            <textarea id="conclusao" type="conclusao" class="form-control @error('conclusao') is-invalid @enderror" name="conclusao" required autocomplete="conclusao" autofocus>{{ $projeto->conclusao }}</textarea>

            @error('conclusao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


        <button type="submit" class="btn btn-success">
            Salvar
        </button>
    </div>
</form>
@endsection

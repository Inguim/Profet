@extends('layouts.app')

@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
    }

    .nav_tabs {
        width: 600px;
        height: 500px;
        margin: 50px auto;
        background-color: #fff;
        position: relative;
    }

    .nav_tabs ul {
        list-style: none;
    }

    .nav_tabs ul li {
        float: left;
    }

    .tab_label {
        display: block;
        width: 300px;
        background-color: #363b48;
        padding: 25px;
        font-size: 20px;
        color: #fff;
        cursor: pointer;
        text-align: center;
    }


    .nav_tabs .rd_tab {
        display: none;
        position: absolute;
    }

    .nav_tabs .rd_tab:checked~label {
        background-color: #086BAB;
        color: #fff;
    }

    .tab-content {
        border-top: solid 5px #086BAB;
        background-color: #fff;
        display: none;
        position: absolute;
        height: 320px;
        width: 600px;
        left: 0;
    }

    .rd_tab:checked~.tab-content {
        display: block;
    }
</style>
<nav class="nav_tabs">
    <ul>
        <li>
            <input type="radio" id="aluno" class="rd_tab" name="tabs" checked>
            <label for="aluno" class="tab_label">Aluno</label>
            <div class="tab-content">
                <article>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="tipo" value="aluno">
                            <div class="form-group row">
                                <label for="name-aluno" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                                <div class="col-md-6">
                                    <input id="name-aluno" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="curso" class="col-md-4 col-form-label text-md-right">{{ __('Curso') }}</label>
                                <div class="col-md-6">
                                    <select id="curso" name="curso_id" class="form-control">
                                        <option></option>
                                        <option value="1">Edificações</option>
                                        <option value="2">Informática</option>
                                        <option value="3">Mecatrônica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Série') }}</label>
                                <div class="col-md-6">
                                    <label class="col-md-2 col-form-label text-md-right" for="serie1">{{ __('1°') }}</label>
                                    <input class="col-md-1" type="radio" name="serie_id" value="1">

                                    <label class="col-md-2 col-form-label text-md-right" for="serie2">{{ __('2°') }}</label>
                                    <input class="col-md-1" type="radio" name="serie_id" value="2">

                                    <label class="col-md-2 col-form-label text-md-right" for="serie3">{{ __('3°') }}</label>
                                    <input class="col-md-1" type="radio" name="serie_id" value="3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email-aluno" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email-aluno" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-aluno" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
                                <div class="col-md-6">
                                    <input id="password-aluno" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm-aluno" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm-aluno" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registre-se') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </article>
            </div>
        </li>
        <li>
            <input type="radio" name="tabs" class="rd_tab" id="tab2">
            <label for="tab2" class="tab_label">Professor</label>
            <div class="tab-content">
                <article>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="tipo" value="professor">
                            <div class="form-group row">
                                <label for="namm-professor" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                                <div class="col-md-6">
                                    <input id="namm-professor" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="categoria_id" class="col-md-4 col-form-label text-md-right">{{ __('Área de Atuação') }}</label>
                                <div class="col-md-6">
                                    <select id="categoria_id" name="categoria_id" class="form-control">
                                        <option></option>
                                        <option value="1">Ciências Agrárias</option>
                                        <option value="2">Ciências Biológicas</option>
                                        <option value="3">Ciências da Saúde</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="emaim-professor" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="emaim-professor" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="passworm-professor" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
                                <div class="col-md-6">
                                    <input id="passworm-professor" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm-professor" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm-professor" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registre-se') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </article>
            </div>
        </li>
    </ul>
</nav>
@endsection

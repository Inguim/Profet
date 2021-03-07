@extends('layouts.app')

@section('content')

<style>
    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: 100%;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: fixed;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 0.5rem;
        width: 90%;
        padding: 5px 10px;
        font-weight: 600;
        color: #000000;
        cursor: pointer;
        text-align: center;
        margin-left: 5px;
        width: auto;
        max-height: 2rem;
        background-color: rgb(239, 239, 239);
    }

    .profile-edit-btn:hover {
        background: #808080;
        color: #ffffff;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }
</style>

<section class="form-horizontal">
    <div class="container emp-profile">
        <div>
            <div class="row">
                <div class="col-4">
                    <div class="profile-img">
                        <img src="{{ asset('perfilpadrao.png') }}" alt="" />
                        <div class="file btn btn-lg btn-info">
                            Alterar foto de perfil
                            <input type="file" name="file" />
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="profile-head">
                            <div>
                                <h5>{{ $user->name }}</h5>
                                <h6 style="text-transform: uppercase;">{{ $user->tipo }}</h6>
                            </div>
                        </div>
                        <div class="row ml-auto">
                            <button type="button" class="profile-edit-btn" name="btnAddMore">Editar</button>
                            @if($user->admin)
                            <a class="profile-edit-btn" href="{{ route('admin') }}">Administrativa</a>
                            @endif
                            <button class="profile-edit-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                {{ __('Sair') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </button>
                        </div>
                    </div>
                    <div class="row my-2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Projetos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Nome</label>
                                        <p>{{ $user->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Email</label>
                                        <p>{{ $user->email }} </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @if($user->tipo == 'aluno')
                                        <label>Curso</label>
                                        <p>{{ $user->aluno->serie->serie }}° {{ $user->aluno->curso->curso }}</p>
                                        @else
                                        <label>Categoria</label>
                                        @foreach($user->professor->categorias as $categoria)
                                        <p>{{ $categoria->nome }}</p>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-12">
                                        @if($user->projetos->count() > 0)
                                        @foreach($user->projetos as $projeto)
                                        <div class="card-1">
                                            <a class="card-link" href="#">{{ $projeto->nome }}</a>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="card-1">
                                            <a class="card-link text-danger">Você não possui projetos</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

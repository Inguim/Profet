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
        cursor: pointer;
        text-align: center;
        margin-left: 5px;
        width: auto;
        max-height: 2rem;

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
    @if($user->status === 'analise')
    <div class="alert alert-warning  alert-dismissible fade show" role="alert">
        Sua conta está em processo de aprovação, podendo ser excluida a qualquer momento
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container emp-profile">
        <div>
            <div class="row">
                <div class="col-4">
                    <div class="profile-img">
                        <img src="{{ asset('perfilpadrao.png') }}" alt="" />
                        @auth
                        @if(Auth::user()->id === $user->id)
                        <div class="file d-none btn btn-lg btn-info">
                            Alterar foto de perfil
                            <input type="file" name="file" />
                        </div>
                        @endif
                        @endauth
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
                            @auth
                            @if(Auth::user()->id === $user->id)
                            <a type="button" class="profile-edit-btn" name="btnAddMore">{{ __('Editar') }}</a>
                            @if($user->admin)
                            <a class="profile-edit-btn" href="{{ route('admin') }}">{{ __('Administrativa') }}</a>
                            @endif
                            <a class="profile-edit-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                {{ __('Sair') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                            @endif
                            @endauth
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
                                        <label class="mb-0">Nome</label>
                                        <p class="text-primary">{{ $user->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="mb-0">Email</label>
                                        <p class="text-primary">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @if($user->tipo == 'aluno')
                                        <label class="mb-0">Curso</label>
                                        <p class="text-primary">{{ $user->aluno->serie->serie }}° {{ $user->aluno->curso->curso }}</p>
                                        @else
                                        <label class="mb-0">Categoria</label>
                                        @foreach($user->professor->categorias as $categoria)
                                        <a class="d-block font-weight-bold" href="{{ route('categoria.show', $categoria->slug) }}">{{ $categoria->nome }}</a>
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
                                            @if(Auth::user()->id === $user->id)
                                            <div class="card-1 mb-3">
                                                <a class="card-link font-weight-bold" href="{{ route('visualizarProjeto', $projeto->id)}}">{{ $projeto->nome }}</a>
                                                @switch($projeto->status)
                                                    @case('aprovado')
                                                    <p class="font-weight-normal text-muted my-0">Estado avaliativo: <span class="text-success">{{ $projeto->status }}</span></p>
                                                    @break
                                                    @case('analise')
                                                    <p class="font-weight-normal text-muted my-0">Estado avaliativo: <span class="text-warning">análise</span></p>
                                                    @break
                                                    @case('alteracao')
                                                    <p class="font-weight-normal text-muted my-0">Estado avaliativo: <span class="text-danger">{{ $projeto->status }}</span></p>
                                                    @break
                                                @endswitch
                                                <div class="my-1">
                                                    <a class="card-link text-warning" href="{{ route('editProjeto', $projeto->id)}}">Editar
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                    <a class="card-link text-danger" href="{{ route('deleteProjeto', $projeto->id)}}">Apagar
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            @else
                                                @if($projeto->status === "aprovado")
                                                <div class="card-1">
                                                    <a class="card-link" href="{{ route('visualizarProjeto', $projeto->id)}}">{{ $projeto->nome }}</a>
                                                </div>
                                                @endif
                                            @endif
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

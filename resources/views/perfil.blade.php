@extends('layouts.app')

@section('content')

<style>

.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
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
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #000000;
    cursor: pointer; 
}
.profile-edit-btn:hover{
    background: #808080;
    color: #ffffff;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}

</style>

<form class="form-horizontal">
                <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-4">
                                <div class="profile-img">
                                    <img src="perfilpadrao.png" alt="" />
                                    <div class="file btn btn-lg btn-info">
                                        Alterar foto de perfil
                                        <input type="file" name="file" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="profile-head">
                                    <h5>
                                        {{ Auth::user()->name }}
                                    </h5>
                                    <h6>
                                        Tipo de Usuário
                                    </h6>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Projetos</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-8">
                                        <div class="tab-content profile-tab" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label>Nome</label>
                                                        <p>{{ Auth::user()->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label>Email</label>
                                                        <p>{{ Auth::user()->email }} </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label>Curso</label>
                                                        <p>Curso selecionado</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card-1">
                                                            <a class="card-link p-2 p-1"
                                                                href="#">
                                                                NOME DO PROJETO </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-2">
                                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Editar Perfil" />
                            </div>
                            <div class="col-2">
                                <button class="profile-edit-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </button>
                            </div>
                        </div>
                    </form>

@endsection
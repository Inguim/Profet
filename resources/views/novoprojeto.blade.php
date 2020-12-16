@extends('layouts.app')
 
@section('content')
 
<style>
    .card{
        margin-top: 50px; 
        margin-bottom: 50px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background: #086BAB;padding: 20px; font-size: 20px; color: #ffffff; text-align: center; border-bottom: solid 5px #ffffff">{{ __('Submissão') }}</div>
 
                <div class="card-body" style="border-top: solid 5px #086BAB;">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Projeto') }}</label>
 
                            <div class="col-md-6">
                                <input id="nome" type="nome" class="form-control" name="nome" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="autor" class="col-md-4 col-form-label text-md-right">{{ __('Autor(es)') }}</label> 
                            <div class="col-md-6">
                                <input id="autor" type="autor" class="form-control" name="autor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="orientador" class="col-md-4 col-form-label text-md-right">{{ __('Orientador(es)') }}</label> 
                            <div class="col-md-6">
                                <input id="orientador" type="orientador" class="form-control" name="orientador">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Área de Atuação') }}</label>
                            <div class="col-md-6">
                                <select id="area" name="area" class="form-control">
                                    <option></option>
                                    <option value="1">Ciências Agrárias</option>
                                    <option value="2">Ciências Biológicas</option>
                                    <option value="3">Ciências da Saúde</option>
                                    <option value="4">Ciências Exatas e da Terra</option>
                                    <option value="5">Ciências Humanas</option>
                                    <option value="6">Ciências Sociais Aplicadas</option>
                                    <option value="7">Engenharias</option>
                                    <option value="8">Linguística, Letras e Artes</option>
                                    <option value="9">Multidisciplinar</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado Atual') }}</label>
                            <div class="col-md-6">
                                <select id="estado" name="estado" class="form-control">
                                    <option></option>
                                    <option value="1">Prototipação</option>
                                    <option value="2">À procura de orientador</option>
                                    <option value="3">À procura de orientando</option>
                                    <option value="4">Em desenvolvimento</option>
                                    <option value="5">Concluído</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="resumo" class="col-md-4 col-form-label text-md-right">{{ __('Resumo') }}</label> 
                            <div class="col-md-6">
                                <textarea id="resumo" type="resumo" class="form-control" name="resumo" placeholder="Resuma seu trabalho em poucas linhas."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="intro" class="col-md-4 col-form-label text-md-right">{{ __('Introdução') }}</label> 
                            <div class="col-md-6">
                                <textarea id="intro" type="intro" class="form-control" name="intro"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="objetivo" class="col-md-4 col-form-label text-md-right">{{ __('Objetivos') }}</label> 
                            <div class="col-md-6">
                                <textarea id="objetivo" type="objetivo" class="form-control" name="objetivo"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="metodo" class="col-md-4 col-form-label text-md-right">{{ __('Metodologia') }}</label> 
                            <div class="col-md-6">
                                <textarea id="metodo" type="metodo" class="form-control" name="metodo"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="resul" class="col-md-4 col-form-label text-md-right">{{ __('Resultados e Discussões') }}</label> 
                            <div class="col-md-6">
                                <textarea id="resul" type="resul" class="form-control" name="resul"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="final" class="col-md-4 col-form-label text-md-right">{{ __('Anexos') }}</label> 
                            <div class="col-md-4">
                                <input id="filebutton" name="filebutton" class="input-file" type="file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="final" class="col-md-4 col-form-label text-md-right">{{ __('Considerações Finais') }}</label> 
                            <div class="col-md-6">
                                <textarea id="final" type="final" class="form-control" name="final"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submeter') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

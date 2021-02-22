@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="margin-top: 50px; margin-bottom:50px">
                <div class="card-header" style="background: #086BAB;padding: 20px; font-size: 20px; color: #ffffff; text-align: center; border-bottom: solid 5px #ffffff">{{ __('O que é META e C&T?') }}</div>
                <div class="card-body" style="border-top: solid 5px #086BAB;">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <h4 style="text-align: center">META</h4>
                            <p style="text-align: justify;">A META – Mostra Específica de Trabalhos e Aplicações – é a feira cientifica e tecnológica do CEFET-MG que divulga trabalhos desenvolvidos
                                alunos e ex-alunos. O evento busca propiciar o desenvolvimento de habilidades para a realização de projetos e a solução de
                                problemas científicos e tecnológicos e sociais, além de difundir os cursos, as áreas de atuação e as atividades do CEFET-MG.</p>
                        </div>
                        <div class="col-md-6">
                            <h4 style="text-align: center">C&T</h4>
                            <p style="text-align: justify;">A Semana de Ciência & Tecnologia é um evento anual que ocorre de acordo com o calendário da
                                Semana Nacional de Ciência & Tecnologia promovido pelo Ministério de Ciência e Tecnologia do Governo Federal. Trata-se de um
                                evento aberto ao público, com o objetivo de reunir alunos, professores e funcionários em torno de debates, seminários,
                                minicursos e conferências sobre cultura, ciência e tecnologia, em diversas áreas do saber.</p>
                        </div>
                    </div>
                </div>
                <div class="card-header" style=" background: #086BAB;padding: 20px; font-size: 20px; color: #ffffff; text-align: center; border-bottom: solid 5px #ffffff">{{ __('Exemplo de Documentos') }}</div>
                <div class="card-body" style="border-top: solid 5px #086BAB;">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <h4 style="text-align: center">EXEMPLO DE SLIDE</h4>
                            <div class="card">
                                <img src="slide.png" alt="Avatar" style="width:100%">
                                <div class="container" style="display: flex; justify-content: center;">
                                    <a href="https://drive.google.com/file/d/1lIB8CNciy_4rHM5I13Uvnjke0ziJMdpa/view?usp=sharing">
                                        <button style=" margin-top: 10px; margin-bottom:10px;" type="submit" class="btn btn-primary">{{ __('Baixar') }}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 style="text-align: center">EXEMPLO DE BANNER</h4>
                            <div class="card">
                                <img src="banner.png" alt="Avatar" style="width:100%">
                                <div class="container" style="display: flex; justify-content: center;">
                                    <a href="https://drive.google.com/file/d/1I3JISU01VSa8nRXZkCAbfysQcR2LmLLX/view?usp=sharing">
                                        <button style=" margin-top: 10px; margin-bottom:10px;" type="submit" class="btn btn-primary">{{ __('Baixar') }}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header" style=" background: #086BAB;padding: 20px; font-size: 20px; color: #ffffff; text-align: center; border-bottom: solid 5px #ffffff">{{ __('Cronograma') }}</div>
                <div class="card-body" style="border-top: solid 5px #086BAB;">
                    <div class="container" style="display: flex; justify-content: center;">
                        <a href="http://www.semanact.cefetmg.br/wp-content/uploads/sites/216/2019/10/Programa%C3%A7%C3%A3o-Semana-CT-2019-Varginha-FINAL.pdf">
                            <button style=" margin-top: 10px; margin-bottom:10px;" type="submit" class="btn btn-primary">{{ __('Baixar') }}</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

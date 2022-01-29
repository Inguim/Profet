<html>
    <head>
        <title>{{ $projeto->nome }}</title>
        <style type="text/css">
            body {
                margin: 15px;
                font-family: sans-serif;
            }
            div {
                margin-bottom: 10px;
            }
            p {
                margin-bottom: 5px;
                margin-top: 0;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align: center">{{ $projeto->nome }}</h2>
        @foreach($projeto->userProjs as $membro)
            @switch($membro->relacao)
                @case("orientador")
                    <p>Orientador: {{ $membro->user->name }}</p>
                    @break
                @case("coorientador")
                    <p>Coorientador: {{ $membro->user->name }}</p>
                    @break
                @case("coordenador")
                    <p>Coordenador: {{ $membro->user->name }}</p>
                    @break
            @endswitch
        @endforeach
        <p>Autores:
            @foreach($projeto->userProjs as $membro)
                @if($membro->relacao === "bolsista" || $membro->relacao === "voluntario")
                    @if($loop->last)
                        {{ $membro->user->name}}
                    @else
                        {{ $membro->user->name }},
                    @endif
                @endif
            @endforeach
        </p>
        <p>Área de Atuação: {{ $projeto->categoria->nome }}</p>
        <p>Estado Atual: {{ $projeto->estado->estado }}</p>
        <p>Data de adesão: {{ $projeto->created_at->format('d/m/Y') }}</p>
    </div>
    <div>
        <h3 >Resumo:</h3>
        <p style="text-align: justify">{{ $projeto->resumo }}</p>
    </div>
    <div>
        <h3>Introdução:</h3>
        <p style="text-align: justify">{{ $projeto->introducao }}</p>
    </div>
    <div>
        <h3>Objetivo:</h3>
        <p style="text-align: justify">{{ $projeto->objetivo }}</p>
    </div>
    <div>
        <h3>Metodologia:</h3>
        <p style="text-align: justify">{{ $projeto->metodologia }}</p>
    </div>
    <div>
        <h3>Resultados e discussões:</h3>
        <p style="text-align: justify">{{ $projeto->result_disc }}</p>
    </div>
    <div>
        <h3>Conclusão:</h3>
        <p style="text-align: justify">{{ $projeto->conclusao }}</p>
    </div>
    </body>
</html>

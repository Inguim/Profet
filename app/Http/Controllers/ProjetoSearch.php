<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;

class ProjetoSearch extends Controller
{
    public function show(Request $request)
    {
        $projetos = Projeto::where('status', 'aprovado')
            ->where('nome', 'LIKE', "%{$request->get('search')}%")
            ->get();

        foreach ($projetos as $projeto) {
          if(strlen($projeto->resumo) > 200) {
            $aux = substr($projeto->resumo, 0, 197);
            $projeto->resumo = substr($projeto->resumo, 0, 197).'...';
          }
        }

        return view('projeto.search', compact('projetos'));
    }
}

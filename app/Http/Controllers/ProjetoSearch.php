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

        return view('projeto.search', compact('projetos'));
    }
}

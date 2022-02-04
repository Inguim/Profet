<?php

namespace App\Http\Controllers;

use App\Http\Traits\formatDate;
use App\Models\Solicitacao;
use App\Models\UsuarioProj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
    use formatDate;

    public function show(Solicitacao $solicitacao)
    {
        if(UsuarioProj::where('user_id', Auth::id())->where('projeto_id', $solicitacao->projeto_id)->exists()) {
          $solicitacao->updated_at_ago = $this->daysAgo($solicitacao->updated_at);
          return view('solicitacao.show', compact('solicitacao'));
        }
        return abort(404);
    }
}

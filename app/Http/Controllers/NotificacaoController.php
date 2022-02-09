<?php

namespace App\Http\Controllers;

use App\Http\Traits\formatDate;
use App\Models\Notificacao;
use App\Models\UsuarioProj;
use Illuminate\Support\Facades\Auth;

class NotificacaoController extends Controller
{
    use formatDate;

    public function show(Notificacao $notificacao)
    {
      if(UsuarioProj::where('user_id', Auth::id())->where('projeto_id', $notificacao->solicitacao->projeto_id)->exists()) {
        $notificacao->solicitacao->updated_at_ago = $this->daysAgo($notificacao->solicitacao->updated_at);
        $notificacao->visto = 1;
        $notificacao->save();
        $solicitacao = $notificacao->solicitacao;
        return view('notificacao.show', compact('solicitacao'));
      }
      return abort(404);
    }
}

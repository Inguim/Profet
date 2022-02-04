<?php

namespace App\Services;

use App\Http\Traits\formatDate;
use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Menu;
use App\Models\Noticia;
use App\Models\Serie;
use App\Models\Solicitacao;
use App\Models\UsuarioProj;
use Illuminate\Support\Facades\Auth;

class ResourcesService
{
    use formatDate;

    public function menus()
    {
        return Menu::with(['categorias'])->get();
    }

    public function categorias()
    {
        return Categoria::all();
    }

    public function series()
    {
        return Serie::all();
    }

    public function cursos()
    {
        return Curso::all();
    }

    public function noticias()
    {
        return Noticia::latest()->take(5)->get();
    }

    public function notificacoes() {
      $projetos = UsuarioProj::where('user_id', Auth::id())->with(['projeto.solicitacaos'])->get();

      $list = [];

      foreach ($projetos as $item) {
        $aux = $item->projeto->solicitacaos;
        $list = [...$list, $aux];
      }
      $notificacoes = [];

      foreach ($list as $item) {
        foreach ($item as $solicitacao) {
          if(! $solicitacao->visto)
            $notificacoes = [...$notificacoes, $solicitacao];
        }
      }

      $notificacoes = collect($notificacoes)->sortByDesc('updated_at');
      foreach ($notificacoes as $item) {
        $item->updated_at_ago = $this->daysAgo($item->updated_at);
      }
      return $notificacoes;
    }
}

<?php

namespace App\Services;

use App\Http\Traits\formatDate;
use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Menu;
use App\Models\Noticia;
use App\Models\Serie;
use App\Models\Solicitacao;
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
      $notificacoes = Solicitacao::latest()->where('user_id', Auth::id())->get();

      foreach ($notificacoes as $item) {
        $item->updated_at_ago = $this->daysAgo($item->updated_at);
      }
      return $notificacoes;
    }
}

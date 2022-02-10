<?php

namespace App\Services;

use App\Http\Traits\formatDate;
use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Menu;
use App\Models\Noticia;
use App\Models\Notificacao;
use App\Models\Serie;

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
      $notificacoes['novas'] = Notificacao::where('visto', false)->orderBy('updated_at', 'DESC')->get();
      $notificacoes['vistas'] = Notificacao::where('visto', true)->orderBy('updated_at', 'DESC')->get();

      if($notificacoes['novas']->count() > 0) {
        foreach ($notificacoes['novas'] as $item) {
          $item->updated_at_ago = $this->daysAgo($item->created_at);
        }
      }

      if($notificacoes['vistas']->count() > 0) {
        foreach ($notificacoes['vistas'] as $item) {
          $item->updated_at_ago = $this->daysAgo($item->updated_at);
        }
      }
      return $notificacoes;
    }
}

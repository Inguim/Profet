<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Categoria;
use App\Models\Projeto;
use Illuminate\Http\Request;

class CategoriasFIltro extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($slug)
  {
    $catId = Categoria::where('slug', $slug)->first()->id;

    $projetos = [
      'recentes' => Projeto::where('categoria_id', $catId)->where('status', 'aprovado')->orderBy('created_at', 'DESC')->take(5)->get(['id', 'nome', 'resumo']),
      'andamento' => Projeto::where('categoria_id', $catId)->where('status', 'aprovado')->where('estado_id', 2)->orderBy('created_at', 'ASC')->take(5)->get(['id', 'nome', 'resumo']),
      'concluido' => Projeto::where('categoria_id', $catId)->where('status', 'aprovado')->where('estado_id', 1)->orderBy('created_at', 'ASC')->take(5)->get(['id', 'nome', 'resumo'])
    ];

    return new DataResource($projetos);
  }

  public function show($slug, $section, $paginate)
  {
    $catId = Categoria::where('slug', $slug)->first()->id;

    switch ($section) {
      case 'recentes':
        $projetos = Projeto::where('categoria_id', $catId)->where('status', 'aprovado')->orderBy('created_at', 'DESC')->skip($paginate)->take(5)->get(['id', 'nome', 'resumo']);
        break;

      case 'andamento':
        $projetos = Projeto::where('categoria_id', $catId)->where('status', 'aprovado')->where('estado_id', 2)->orderBy('created_at', 'ASC')->skip($paginate)->take(5)->get(['id', 'nome', 'resumo']);
        break;

      case 'concluido':
        $projetos = Projeto::where('categoria_id', $catId)->where('status', 'aprovado')->where('estado_id', 1)->orderBy('created_at', 'ASC')->skip($paginate)->take(5)->get(['id', 'nome', 'resumo']);
        break;
    }

    return new DataResource($projetos);
  }
}

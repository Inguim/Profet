<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Http\Traits\formatDate;
use App\Models\Notificacao;
use App\Models\Projeto;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitacaoController extends Controller
{
  use formatDate;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = [
      'solicitados' => Solicitacao::where('status', 'aguardando')->with(['projeto:id,nome'])->orderBy('updated_at', 'ASC')->get(['id', 'descricao', 'status', 'titulo', 'updated_at', 'projeto_id']),
      'alterados' => Solicitacao::where('status', 'alterado')->with(['projeto:id,nome'])->orderBy('updated_at', 'ASC')->get(['id', 'descricao', 'status', 'titulo', 'updated_at', 'projeto_id'])
    ];

    foreach ($data as $tipo) {
      foreach ($tipo as $solicitacao) {
        $solicitacao->updated_at_ago = $this->daysAgo($solicitacao->updated_at);
      }
    }

    return new DataResource($data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $message = [
      'erro' => false,
      'message' => ''
    ];
    try {
      Solicitacao::create([
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'status' => 'aguardando',
        'creator_id' => Auth::id(),
        'projeto_id' => $request->projeto_id
      ]);

      $projeto = Projeto::find($request->projeto_id);
      $projeto->status = 'alteracao';
      $projeto->save();

      return new DataResource($message);
    } catch (\Throwable $th) {
      $message = [
        'erro' => false,
        'message' => 'Não foi possivel cadastrar a solicitação!'
      ];

      return new DataResource($message);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Solicitacao  $solicitacao
   * @return \Illuminate\Http\Response
   */
  public function show(Solicitacao $solicitacao)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Solicitacao  $solicitacao
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Solicitacao $solicitacao)
  {
    $message = [
      'erro' => false,
      'message' => ''
    ];

    try {
      DB::beginTransaction();
      if($request->tipo_alteracao == 1) {
        $solicitacao->descricao = $request->descricao;
        $solicitacao->titulo = $request->titulo;
      } else {
        $solicitacao->status = $request->status;
        if(Notificacao::where('solicitacao_id', $solicitacao->id)->first()->exists()) {
          Notificacao::where('solicitacao_id', $solicitacao->id)->orderBy('updated_at', "DESC")->first()->update(['visto' => 0]);
          $projeto = Projeto::find($solicitacao->projeto->id);
          $projeto->status = $request->tipo_alteracao == 2 ? 'analise' : 'aprovado';
          $projeto->save();
        }
      }
      $solicitacao->save();

      DB::commit();
      return new DataResource($message);
    } catch (\Throwable $th) {
      $message = [
        'erro' => false,
        'message' => 'Não foi possivel editar a solicitação!'
      ];

      return new DataResource($message);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Solicitacao  $solicitacao
   * @return \Illuminate\Http\Response
   */
  public function destroy(Solicitacao $solicitacao)
  {
    $message = [
      'erro' => false,
      'message' => ''
    ];

    try {
      $solicitacao->delete();

      return new DataResource($message);
    } catch (\Throwable $th) {
      $message = [
        'erro' => false,
        'message' => 'Não foi possivel deletar a solicitação!'
      ];

      return new DataResource($message);
    }
  }
}

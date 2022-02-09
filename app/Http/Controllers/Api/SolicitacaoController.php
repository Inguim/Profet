<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Projeto;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Solicitacao  $solicitacao
   * @return \Illuminate\Http\Response
   */
  public function destroy(Solicitacao $solicitacao)
  {
    //
  }
}

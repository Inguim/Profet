<?php

namespace App\Observers;

use App\Models\Notificacao;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\DB;

class SolicitacaoObserver
{

  public $afterCommit = true;
  /**
   * Handle the Solicitacao "created" event.
   *
   * @param  \App\Models\Solicitacao  $solicitacao
   * @return void
   */
  public function created(Solicitacao $solicitacao)
  {
    try {
      DB::beginTransaction();
      foreach ($solicitacao->projeto->users as $user) {
        Notificacao::create([
          'tipo_id' => 1,
          'user_id' => $user->id,
          'solicitacao_id' => $solicitacao->id
        ]);
      }
      DB::commit();
    } catch (\Throwable $th) {
      dd($th);
    }
  }

  /**
   * Handle the Solicitacao "updated" event.
   *
   * @param  \App\Models\Solicitacao  $solicitacao
   * @return void
   */
  public function updated(Solicitacao $solicitacao)
  {
    //
  }

  /**
   * Handle the Solicitacao "deleted" event.
   *
   * @param  \App\Models\Solicitacao  $solicitacao
   * @return void
   */
  public function deleted(Solicitacao $solicitacao)
  {
    //
  }

  /**
   * Handle the Solicitacao "restored" event.
   *
   * @param  \App\Models\Solicitacao  $solicitacao
   * @return void
   */
  public function restored(Solicitacao $solicitacao)
  {
    //
  }

  /**
   * Handle the Solicitacao "force deleted" event.
   *
   * @param  \App\Models\Solicitacao  $solicitacao
   * @return void
   */
  public function forceDeleted(Solicitacao $solicitacao)
  {
    //
  }
}

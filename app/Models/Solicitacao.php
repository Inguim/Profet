<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function projeto() {
      return $this->belongsTo('App\Models\Projeto');
    }

    public function notificacaos() {
      return $this->hasMany('App\Models\Notificacao');
    }
}

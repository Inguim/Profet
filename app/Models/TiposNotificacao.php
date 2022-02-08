<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposNotificacao extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function notificacao() {
      return $this->hasMany('App\Models\Notificacao');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tipo() {
      return $this->belongsTo('App\Models\TiposNotificacao');
    }

    public function user() {
      return $this->belongsTo('App\Models\User');
    }
}

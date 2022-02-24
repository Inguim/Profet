<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuidor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tipo_contribuicao() {
      return $this->belongsTo('App\Models\TipoContribuicao');
    }

    public function user() {
      return $this->hasOne('App\Models\User');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioProj extends Model
{
    use HasFactory;

    protected $fillable = [
        'relacao',
        'user_id',
        'projeto_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function projeto() {
      return $this->belongsTo('App\Models\Projeto', 'projeto_id');
  }
}

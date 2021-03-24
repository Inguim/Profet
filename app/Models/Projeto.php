<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'resumo',
        'introducao',
        'objetivo',
        'metodologia',
        'result_disc',
        'conclusao',
        'categoria_id',
        'estado_id',
    ];

    public function users() {
        return $this->belongsToMany('App\Models\User', 'usuario_projs');
    }

    public function userProjs() {
        return $this->hasMany('App\Models\UsuarioProj');
    }

    public function estado() {
        return $this->belongsTo('App\Models\Estado');
    }

    public function categoria() {
        return $this->belongsTo('App\Models\Categoria');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'curso_id',
        'serie_id'
    ];

    public function curso() {
        return $this->belongsTo('App\Models\Curso');
    }

    public function serie() {
        return $this->belongsTo('App\Models\Serie');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'menu_id'
    ];

    public function menu() {
        return $this->belongsTo('App\Models\Menu');
    }

    public function professors() {
        return $this->belongsToMany('App\Models\Categoria', 'professor_cats');
    }

    public function projetos() {
        return $this->hasMany('App\Models\Projeto');
    }
}

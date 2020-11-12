<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function categorias() {
        return $this->belongsToMany('App\Models\Categoria', 'professor_cats');
    }
}

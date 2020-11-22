<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorCat extends Model
{
    use HasFactory;

    protected $fillable = [
        'professor_id',
        'categoria_id'
    ];

    public function categoria() {
        return $this->belongsTo('App\Models\Categoria');
    }
}

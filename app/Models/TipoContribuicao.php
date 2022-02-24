<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContribuicao extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function contribuidor() {
      return $this->hasOne('App\Models\Contribuidor');
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo',
        'admin'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projetos() {
        return $this->belongsToMany('App\Models\Projeto', 'usuario_projs');
    }

    public function noticias() {
        return $this->hasMany('App\Models\Noticia');
    }

    public function aluno() {
        return $this->hasOne('App\Models\Aluno');
    }

    public function professor() {
        return $this->hasOne('App\Models\Professor');
    }

    public function notificacaos() {
      return $this->hasMany('App\Models\Notificacao');
    }

    public function solicitacaos() {
      return $this->hasMany('App\Models\Solicitacao', 'creator_id');
    }

    public function contribuidor() {
      return $this->belongsTo('App\Nodels\Contribuidor');
    }
}

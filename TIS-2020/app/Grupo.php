<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Grupo extends Authenticatable
{
    use Notifiable;

    protected $guard = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero', 'id_materia', 'sis_usuario',
    ];
}

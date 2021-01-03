<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Horario extends Authenticatable
{
    use Notifiable;

    protected $guard = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dia', 'hora_inicio', 'hora_fin', 'id_grupo',
    ];
}

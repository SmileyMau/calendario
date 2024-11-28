<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'id_user',
        'titulo',
        'descripcion',
        'fecha_ini',
        'fecha_fin',
        'color',
        'status',
    ];
}

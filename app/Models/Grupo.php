<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'descripcion',
        'status',
        'id_tipo',
        'observacion',
    ];
}

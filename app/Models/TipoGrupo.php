<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoGrupo extends Model
{
    protected $fillable = [
        'descripcion',
        'status',
    ];
}

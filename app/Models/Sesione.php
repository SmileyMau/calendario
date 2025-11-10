<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sesione extends Model
{
    protected $fillable=[
        'id_grupo',
        'fecha',
        'descripcion',
        'objetivo',
        'numero',

    ];
   
}

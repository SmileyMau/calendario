<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsables extends Model
{
    protected $fillable=[
        'id_acuerdo',
        'id_usuario',
        'estatus',
    ]; 
}

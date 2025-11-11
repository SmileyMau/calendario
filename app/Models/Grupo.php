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
    public function tipoGrupo()
    {
        return $this->belongsTo(TipoGrupo::class, 'id_tipo');
    }
}

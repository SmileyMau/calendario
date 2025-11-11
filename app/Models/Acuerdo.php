<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{
    protected $fillable=[
        'id_sesion',
        'fecha_limite',
        'num_acuerdo',
        'num_acuerdo',
        'estatus',
        'nomenclatura',
    ];
     public function sesion(){
        return $this->belongsTo(Sesione::class, 'id_sesion');
    }
    public function responsables()
{
    return $this->hasMany(Responsables::class, 'id_acuerdo');
}

}

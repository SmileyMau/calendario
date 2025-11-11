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
    public function acuerdo(){
        return $this->belongsTo(Acuerdo::class,'id_acuerdo');
    }
    public function usuario()
{
    return $this->belongsTo(User::class, 'id_usuario');
}

}

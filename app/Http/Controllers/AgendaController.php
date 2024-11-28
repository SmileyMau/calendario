<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;

class AgendaController extends Controller
{
    public function index()
    {
        try {
            //dd('entro');
            if (auth()->user()->rol == "A") {
                $eventos = Evento::where('id_user','=',auth()->user()->id)->get();
            }else{
                $eventos = Evento::all();
            }
            return view('calendar', compact('eventos'));
        } catch (\Throwable $th) {
            throw $th;
        }       
    }
}

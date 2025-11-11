<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Evento;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            if (auth()->user()->rol == "SA") {
                $eventos = DB::table('eventos')
                ->join('users','eventos.id_user','users.id')
                ->select('eventos.*','users.name','users.last_name','users.email')
                ->orderBy('eventos.id','DESC')
                ->get();
                return view('eventos.index', compact('eventos'));
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $evento = Evento::create([
                'id_user' => auth()->user()->id,
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'fecha_ini' => Carbon::parse($request->fecha_ini),
                'fecha_fin' => Carbon::parse($request->fecha_fin),
                'color' => $request->color,
                'status' => 'P',
            ]);
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\TipoGrupo;
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $grupos = Grupo::all();
            $tipo_grupos = TipoGrupo::all();
            return view('grupo.index', compact('grupos', 'tipo_grupos'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'ERROR AL OBTENER LOS GRUPOS'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $tipoGrupos = TipoGrupo::all();
            return view('grupo.create', compact('tipoGrupos'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'ERROR AL OBTENER LOS TIPOS DE GRUPOS'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         try{
            $grupo = Grupo::create([
                'descripcion' => $request->input('descripcion'),
                'id_tipo' => $request->input('id_tipo'),
                'observacion' => $request->input('observacion'),
                'status' => 'A',

            ]);
            $grupo->save();

            return back()->with('success','Exito al Guardar');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $grupo = Grupo::findOrFail($id);
            $tipo_grupos = TipoGrupo::all();
             return view('grupo.show',compact('grupo', 'tipo_grupos'));

        } catch (\Exception $e) {
            return response()->json(['error' => 'GRUPO NO ENCONTRADO'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $grupo = Grupo::findOrFail($id);
            return view('grupo.edit',compact('grupo', 'tipo_grupos'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'GRUPO NO ENCONTRADO'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    try {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'id_tipo' => 'required|integer|exists:tipo_grupos,id',
            'observacion' => 'nullable|string|max:500',
        ]);

        $grupo = Grupo::findOrFail($id);

        $grupo->descripcion = $request->input('descripcion');
        $grupo->id_tipo = $request->input('id_tipo');
        $grupo->observacion = $request->input('observacion');
        $grupo->save();|

        return redirect()->route('grupo.index')->with('success', 'Grupo actualizado correctamente.');
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'ERROR AL ACTUALIZAR EL GRUPO',
            'detalle' => $e->getMessage()
        ], 500);
    }
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $grupo = Grupo::findOrFail($id);
            $grupo->delete();
            return response()->json(['message' => 'GRUPO ELIMINADO'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'ERROR AL ELIMINAR EL GRUPO'], 500);
        }
    }
}

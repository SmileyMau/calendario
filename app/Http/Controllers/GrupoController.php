<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $grupos = Grupo::all();
            return view('grupo.index', compact('grupos'));
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
            $tipoGrupos = Grupo::all();
            return response()->json($tipoGrupos, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'ERROR AL OBTENER LOS TIPOS DE GRUPOS'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $grupo = Grupo::create($request->all());

    return response()->json($grupo);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $grupo = Grupo::findOrFail($id);
            return response()->json($grupo, 200);
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
            return response()->json($grupo, 200);
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
            $grupo = Grupo::findOrFail($id);
            $grupo->update($request->all());
            return response()->json($grupo, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'ERROR AL ACTUALIZAR EL GRUPO'], 500);
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

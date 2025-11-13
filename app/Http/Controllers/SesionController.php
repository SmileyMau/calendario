<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Sesione;
use Illuminate\Http\Request;
use OpenTelemetry\SDK\Resource\Detectors\Service;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $sesion=Sesione::all(); 
            $grupos=Grupo::all(); 
            return view('sesiones.index',compact('sesion','grupos'));
            

        }catch(\Exception $e){
            return back()->with('error','Al parecer Hubo un error ');

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
        try{
            $sesion=Sesione::Create([
           
                'id_grupo'=>$request->input('id_grupo'),
                'fecha'=>$request->input('fecha'),
                'descripcion'=>$request->input('descripcion'),
                'objetivo'=>$request->input('objetivo'),
                'numero'=>$request->input('numero'),

            ]);
        $sesion->save(); 
        return back()->with('success','Exito al guardar Sesión'); 

        }catch(\Exception $e){
            return back()->with('error','No se pudo almacenar');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $sesion=Sesione::findOrFail($id);
            $grupos=Grupo::all(); 
            return view('sesiones.show',compact('sesion','grupos'));
        }catch(\Exception $e){
            return back()->with('error','al parecer  Hubo un error ');

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $sesion=Sesione::findOrFail($id);
            $grupos=Grupo::all(); 
            return view('sesiones.edit',compact('sesion','grupos'));

        }catch(\Exception $e){
            return back()->with('error','Al parecer Hubo un Error');

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $sesion=Sesione::findOrFail($id);
            $sesion->update($request->all());
            return back()->with('success', 'Sesión modificada exitosamente.');
        }catch(\Exception $e){
            return back()->with('error','No se pudo actualizar');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $sesion=Sesione::findOrFail($id);
            $sesion->delete(); 
            return back()->with('success', 'Sesión Eliminada exitosamente.');
        }catch(\Exception $e){
            return back()->with('error','No se pudo eliminar');

        }
    }
}

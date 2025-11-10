<?php

namespace App\Http\Controllers;

use App\Models\Acuerdo;
use App\Models\Sesione;
use Illuminate\Http\Request;

class AcuerdoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $acuerdos=Acuerdo::all(); 
            $sesiones=Sesione::all(); 
            return view('acuerdos.index',compact('acuerdos','sesiones'));
            //return back()->with('success','Exito');
        }catch(\Exception){
            return back()->with('error','Al Parecer Hubo un Error');

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
            $acuerdo=Acuerdo::create([
                'id_sesion'=>$request->input('id_sesion'),
                'num_acuerdo'=>$request->input('num_acuerdo'),
                'fecha_limite'=>$request->input('fecha_limite'),
                'estatus'=>'A',
                'nomenclatura'=>$request->input('nomenclatura'),
            ]);
            $acuerdo->save();

            return back()->with('success','Exito al Guardar');
        }catch(\Exception){
            return back()->with('error','Al Parecer Hubo un Error');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         try{
            $acuerdos=Acuerdo::findOrFail($id); 
            $sesiones=Sesione::all(); 
            return view('acuerdos.show',compact('acuerdos','sesiones'));
            //return back()->with('success','Exito');
        }catch(\Exception){
            return back()->with('error','Al Parecer Hubo un Error');

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         try{
            $acuerdos=Acuerdo::findOrFail($id);     
            $sesiones=Sesione::all(); 
            return view('acuerdos.edit',compact('acuerdos','sesiones'));
            //return back()->with('success','Exito');
        }catch(\Exception){
            return back()->with('error','Al Parecer Hubo un Error');

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          try{
            $acuerdo=Acuerdo::findOrFail($id);
            $acuerdo->update($request->all());
            return back()->with('success', 'Acuerdo modificado exitosamente.');
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
            $acuerdo=Acuerdo::findOrFail($id);
            $acuerdo->delete();
            return back()->with('success','Exito al Eliminar');
        }catch(\Exception){
            return back()->with('error','Al Parecer Hubo un Error');

        }
    }
}

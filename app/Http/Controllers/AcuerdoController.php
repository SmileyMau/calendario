<?php

namespace App\Http\Controllers;

use App\Models\Acuerdo;
use App\Models\Responsables;
use App\Models\Sesione;
use App\Models\User;
use Illuminate\Http\Request;

class AcuerdoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $acuerdos = Acuerdo::all(); 
            $sesiones = Sesione::all(); 
            $usuarios = User::all(); 
            return view('acuerdos.index', compact('acuerdos', 'sesiones', 'usuarios'));
        } catch (\Exception $e) {
            return back()->with('error', 'Al parecer hubo un error: ' . $e->getMessage());
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
            // Validación
            $request->validate([
                'id_sesion' => 'required|exists:sesiones,id',
                'num_acuerdo' => 'required|integer',
                'fecha_limite' => 'nullable|date',
                'nomenclatura' => 'nullable|string|max:255',
                'id_responsable' => 'required|array|min:1',
                'id_responsable.*' => 'required|exists:users,id',
            ]);

            $acuerdo = Acuerdo::create([
                'id_sesion' => $request->input('id_sesion'),
                'num_acuerdo' => $request->input('num_acuerdo'),
                'fecha_limite' => $request->input('fecha_limite'),
                'estatus' => 'A',
                'nomenclatura' => $request->input('nomenclatura'),
            ]);

            $id_responsable = $request->input('id_responsable');
            
            foreach ($id_responsable as $id_usuario) {
                Responsables::create([
                    'id_acuerdo' => $acuerdo->id,
                    'id_usuario' => $id_usuario,
                    'estatus' => 'A',
                ]);
            }

            return back()->with('success', 'Acuerdo creado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Al parecer hubo un error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $acuerdos = Acuerdo::findOrFail($id); 
            $sesiones = Sesione::all(); 
    
            return view('acuerdos.show', compact('acuerdos', 'sesiones'));
        } catch (\Exception $e) {
            return back()->with('error', 'Al parecer hubo un error: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $acuerdos = Acuerdo::with('responsables')->findOrFail($id);     
            $sesiones = Sesione::all(); 
            $usuarios = User::all(); 
            return view('acuerdos.edit', compact('acuerdos', 'sesiones', 'usuarios'));
        } catch (\Exception $e) {
            return back()->with('error', 'Al parecer hubo un error: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validación
            $request->validate([
                'id_sesion' => 'required|exists:sesiones,id',
                'num_acuerdo' => 'required|integer',
                'fecha_limite' => 'nullable|date',
                'nomenclatura' => 'nullable|string|max:255',
                'id_responsable' => 'required|array|min:1',
                'id_responsable.*' => 'required|exists:users,id',
            ]);

            $acuerdo = Acuerdo::findOrFail($id);

            
            $acuerdo->update([
                'id_sesion' => $request->input('id_sesion'),
                'num_acuerdo' => $request->input('num_acuerdo'),
                'fecha_limite' => $request->input('fecha_limite'),
                'nomenclatura' => $request->input('nomenclatura'),
            ]);

            $nuevosResponsables = array_filter($request->input('id_responsable', []));
            $nuevosResponsables = array_unique($nuevosResponsables); // Evitar duplicados

    
            $responsablesActuales = Responsables::where('id_acuerdo', $acuerdo->id)
                ->pluck('id_usuario')
                ->toArray();

          
            $aEliminar = array_diff($responsablesActuales, $nuevosResponsables);
            if (!empty($aEliminar)) {
                Responsables::where('id_acuerdo', $acuerdo->id)
                    ->whereIn('id_usuario', $aEliminar)
                    ->delete();
            }


            $aAgregar = array_diff($nuevosResponsables, $responsablesActuales);
            foreach ($aAgregar as $id_user) {
                Responsables::create([
                    'id_acuerdo' => $acuerdo->id,
                    'id_usuario' => $id_user,
                    'estatus' => 'A',
                ]);
            }

            return redirect()->route('acuerdos.index')->with('success', 'Acuerdo actualizado exitosamente');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'No se pudo actualizar el acuerdo: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $acuerdo = Acuerdo::findOrFail($id);
            
     
            Responsables::where('id_acuerdo', $id)->delete();
            
            $acuerdo->delete();
            return back()->with('success', 'Acuerdo eliminado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Al parecer hubo un error: ' . $e->getMessage());
        }
    }
}
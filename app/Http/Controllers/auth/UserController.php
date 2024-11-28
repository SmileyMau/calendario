<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class UserController extends Controller
{

    public function login(Request $request)
    {
        try {
            //dd($request);
            $credentials = $request->validate([
                'email' =>['required', 'string', 'email'],
                'password' =>['required', 'string']
            ]);
           
            if(Auth::attempt($credentials)){
                //dd('pes');
                $request->session()->regenerate();
                return redirect('/');
            }else {
                return back()->with('error','El usuario y contraseña son incorrectos');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $date = Carbon::now();
            $year = $date->year;
            $date = $date->format('Y-m-d');
            
            /*if ($date >= $year.'-10-20' && $date <= $year.'-11-10' ) {
                $style_card = 'card-dmuertos';
                $color_card = 'color-dmuertos';
                $style_input = 'input-dmuertos';
                $style_btn = 'btn-dmuertos';
                $style_a = 'a-dmuertos';
                $style_text = 'text-dmuertos';
                $img = 'admin/assets/img/backgrounds/login_dia_muertos.jpg';
            }else{
                $style_card = '';
                $color_card = '';
                $style_input = '';
                $style_btn = '';
                $style_a = '';
                $style_text = '';
                $img = "";

            }*/
            //dd($style_card);
            return view('login');
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
        //
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

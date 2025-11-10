<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesionController;
use App\Models\Evento;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


/*Route::get('/', function () {
    $eventos = Evento::where('id_user','=',auth()->user()->id)->get();
    return view('calendar', compact('eventos'));
})->middleware('auth');*/

Route::get('/', 'App\Http\Controllers\AgendaController@index')->name('agenda.index')->middleware('auth');


Route::get('/logout', function () {
    Auth::logout();
    return back();
 })->name('logout')->middleware('auth');
 
Route::get('/login', 'App\Http\Controllers\auth\UserController@index')->name('login.index')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\auth\UserController@login')->name('login')->middleware('guest');
Route::resource('/sesiones','App\Http\Controllers\SesionController');
Route::resource('/acuerdos','App\Http\Controllers\AcuerdoController');



Route::get('admin', function () {
    return view('template');
});

Route::get('test', function () {
    $evento = Evento::find(2);
    return view('reminder', compact('evento'));
});
Route::resource('/evento', 'App\Http\Controllers\EventoController');


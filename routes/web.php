<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard
Route::get('/','DashController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Personas
Route::get('crear-persona',function(){return view('admin.persona.crear');});
Route::post('crear-persona','PersonaController@crear');
Route::get('listar/{nombre}','PersonaController@listar');
Route::get('detalle/{id}','PersonaController@detalle');
Route::get('editar/{id}','PersonaController@editar');
Route::get('eliminar_tipo/{id}','PersonaController@eliminarTipo');
Route::get('eliminar_interes/{id}','PersonaController@eliminarInteres');
Route::post('actualizar_persona/{id}','PersonaController@actualizar');

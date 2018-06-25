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


Route::get('/',function(){return view('login');});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Llamadas con TWILIO
Route::post('call','CallController@call');
Route::get('terminar/{sid}','CallController@terminar');
Route::post('record','CallController@record');
Route::get('audio','CallController@audio');
Route::get('llamadas','CallController@lista');
Route::get('llamadas-server','CallController@listaServer');
Route::get('llamar',function(){
  return view('admin.callcenter.llamar');
});


// Personas
Route::middleware(['auth'])->group(function(){


  Route::get('ixtus','DashController@index');

  Route::get('crear-persona/{audio?}','PersonaController@index')
         ->name('persona.create')
         ->middleware('permission:persona.create');

  Route::get('listar/{nombre}','PersonaController@listar')
         ->name('persona.index')
         ->middleware('permission:persona.index');
  Route::post('crear-persona','PersonaController@crear');

  Route::get('editar/{id}','PersonaController@editar')
      ->name('persona.edit')
      ->middleware('permission:persona.edit');

  Route::get('detalle/{id}','PersonaController@detalle')
      ->name('persona.show')
      ->middleware('permission:persona.show');

  Route::get('eliminar_tipo/{id}','PersonaController@eliminarTipo');

  Route::get('eliminar_interes/{id}','PersonaController@eliminarInteres');
  
  Route::post('actualizar_persona/{id}','PersonaController@actualizar');

});





// Seguimiento
Route::get('historial/{id}','SeguimientoController@index');
Route::post('crar_nota/{id}','SeguimientoController@crearNota');
//Suscripciones
Route::get('suscripciones','SuscripcionController@lista');
Route::post('suscripcion/{id}','SuscripcionController@crear');
Route::get('suscripcion/{id}','SuscripcionController@ver');
Route::get('crear-suscripcion','SuscripcionController@crearSuscripcion');
// Usuario
Route::get('usuario-crear','UsuarioController@crear');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

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

Route::post('verificar','UsuarioController@verificar');
// Grupode rutas
Route::middleware(['auth'])->group(function(){
Route::get('ixtus','DashController@index');
  // Titular
  Route::get('crear-persona/{audio?}','PersonaController@index')
         ->name('crear.titular')
         ->middleware('permission:crear.titular');

  Route::get('listar/{nombre}','PersonaController@listar')
         ->name('listar.titular')
         ->middleware('permission:listar.titular');

  //Consulta json con datatables
  Route::get('get_titulares','TitularController@getTitulares')->name('gettitulares')->middleware('permission:listar.titular');
  Route::get('titulares','TitularController@showTitulares')->name('titulares')->middleware('permission:listar.titular');
  // Fin de Consulta

  Route::post('crear-persona','PersonaController@crear');
  Route::get('editar/{id}','PersonaController@editar')
      ->name('editar.titular')
      ->middleware('permission:editar.titular');

  Route::get('detalle/{id}','PersonaController@detalle')
      ->name('ver.titular')
      ->middleware('permission:ver.titular');

  Route::get('eliminar_tipo/{id}','PersonaController@eliminarTipo');

  Route::get('eliminar_interes/{id}','PersonaController@eliminarInteres');

  Route::post('actualizar_persona/{id}','PersonaController@actualizar');


  // Suscripciones
  Route::get('suscripciones','SuscripcionController@lista')
  ->name('listar.suscripcion')
  ->middleware('permission:listar.suscripcion');

  Route::get('editar_suscripcion/{id}','SuscripcionController@edit')
  ->name('editar.suscripcion')
  ->middleware('permission:editar.suscripcion');

  Route::get('crear-suscripcion','SuscripcionController@crearSuscripcion')
  ->name('crear.suscripcion')
  ->middleware('permission:crear.suscripcion');

  Route::get('suscripcion/{id}','SuscripcionController@ver')
  ->name('ver.suscripcion')
  ->middleware('permission:ver.suscripcion');

  Route::get('eliminar_suscripcion/{id}','SuscripcionController@destroy')
  ->name('eliminar.suscripcion')
  ->middleware('permission:eliminar.suscripcion');

  Route::post('suscripcion/{id}','SuscripcionController@crear');

  Route::post('actualizar_suscripcion/{id}','SuscripcionController@update')
  ->name('actualizar.suscripcion');
  Route::post('crear-suscripcion','SuscripcionController@store');

  Route::get('agregar-suscripcion/{id}','SuscripcionController@agregar')
  ->name('agregar.suscripcion')
  ->middleware('permission:crear.suscripcion');
  Route::post('agregar-suscripcion/{id}','SuscripcionController@agregarSuscripcion')
  ->name('agregar.suscripcion')
  ->middleware('permission:crear.suscripcion');

  // Usuarios
  Route::get('usuario-crear','UsuarioController@crear')
  ->name('crear.usuario')->middleware('permission:crear.usuario');
  Route::post('usuario-crear','UsuarioController@store');
  Route::get('usuario-editar/{user}','UsuarioController@edit')->name('editar.usuario');
  Route::get('usuario-eliminar/{user}','UsuarioController@destroy')->name('eliminar.usuario');
  Route::post('usuario-update/{user}','UsuarioController@update')->name('usuario.update');

  Route::post('cambio_pass/{id}','UsuarioController@cambioPass');

  //Roles
  Route::get('role/crear','RoleController@index')
  ->name('crear.roles')
  ->middleware('permission:crear.roles');
  Route::post('role/crear','RoleController@store')->name('roles.store');
  Route::get('role-edit/{role}','RoleController@edit')->name('roles.edit');
  Route::get('role-eliminar/{role}','RoleController@eliminar')->name('roles.eliminar');
  Route::post('role-update/{role}','RoleController@update')->name('roles.update');

  // Donacion
  Route::get('crear_donacion','DonacionController@crear')
  ->name('crear.donacion')
  ->middleware('permission:crear.donacion');

  Route::get('listar_donaciones','DonacionController@listar')
  ->name('listar.donaciones')
  ->middleware('permission:listar.donaciones');

  Route::get('editar_donaciones/{donacion}','DonacionController@edit')
  ->name('editar.donaciones')
  ->middleware('permission:editar.donaciones');

  Route::get('ver_donacion/{donacion}','DonacionController@ver')
  ->name('ver.donacion')
  ->middleware('permission:ver.donacion');

  Route::get('aliminar/{id}','DonacionController@destroy')
  ->name('eliminar.donacion')
  ->middleware('permission:eliminar.donacion');

  Route::post('update_donaciones/{id}','DonacionController@update');
  Route::post('crear_donacion','DonacionController@store');

  Route::get('agregar-donacion/{id}','DonacionController@agregar')
  ->name('agregar.donacion')
  ->middleware('permission:crear.donacion');

  Route::post('agregar-donacion/{id}','DonacionController@agregarDonacion')
  ->name('agregar.donacion')
  ->middleware('permission:crear.donacion');

  // Reportes
  Route::get('bd_nacional','ReporteController@titularNacional')
  ->name('reporte.nacional')
  ->middleware('permission:reporte.nacional');

  Route::get('reportes','ReporteController@index');
  Route::get('reporte_suscripcion','ReporteController@suscripciones');
  Route::get('reporte_regional/{reporte}','ReporteController@reporteRegional')->name('reporte.regional');
  Route::get('reporte_donaciones','ReporteController@donaciones');
  Route::get('totales','ReporteController@totales');
  Route::get('parametros','ReporteController@parametros');
  Route::post('reporteTitulares','ReporteController@reporteTitulares');
  Route::post('reporteSuscripciones','ReporteController@reporteSuscripciones');
  Route::post('reporteDonaciones','ReporteController@reporteDonaciones');

  Route::get('descargar_titulares','ReporteController@descargarTitulares')->name('descargar.titulares');
  Route::get('descargar_suscripciones','ReporteController@descargarSuscripciones')->name('descargar.suscripciones');

});


// Soporte
Route::post('soporte','SoporteController@general');
Route::get('autorizacion',function(){
  return view('mails.autorizacion');
});




// Seguimiento
Route::get('historial/{id}','SeguimientoController@index');
Route::post('crar_nota/{id}','SeguimientoController@crearNota');

Route::get('logout','UsuarioController@logout');
 Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//NOTIFICACIONES
Route::get('eliminar/notificacion/{notificacion}','NotificacionController@delete');

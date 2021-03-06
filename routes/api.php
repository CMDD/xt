<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// RUTAS IXTUS VERSION 2.0
Route::get('ixtus-titulares','TitularController@titulares');
Route::get('ixtus-titular-region/{id}','TitularController@titularPorRegion');

//Suscripciones
Route::get('/suscripcion/{id}','SuscripcionController@suscripcion');
Route::get('suscripciones','SuscripcionController@suscripciones');
Route::post('actualizar-suscripcion','SuscripcionController@actualizarSuscripcion');
//  Ixtus v 2.0
Route::get('sus-nacional/{iduser}','Suscripcion\SuscripcionController@nacional');
//Reporte
Route::get('reporte/suscripciones/total','Contacto\ReporteController@suscripcionesTotal');
Route::get('reporte/suscripciones/activas','Contacto\ReporteController@suscripcionesActivas');
Route::get('reporte/suscripciones/desactivas','Contacto\ReporteController@suscripcionesDesactivas');
Route::get('suscripciones-completas/{estado}','Reporte\ReporteController@SuscripcionesCompletas');
Route::get('suscripciones-servientrega','Reporte\ReporteController@SuscripcionesServientrega');
Route::get('cantidad-suscripciones','Suscripcion\SuscripcionController@cantidadesSuscripciones');



//Notas
Route::post('crear-nota','SeguimientoController@crearNotas');
Route::get('notas/{id}','SeguimientoController@notas');
//FIN RUTAS

Route::middleware('auth:api')->get('/user', function (Request $request) {
        
return $request->user();
});

Route::get('/departamentos/{id}/municipios','RegionController@cargarMunicipios');
Route::get('/region/{id}/departamentos','RegionController@cargarDepartamentos');
Route::get('regiones','RegionController@regiones');




// WEBSERVICES
Route::post('autorizo','WebserviceController@create');


Route::get('reporte-regional/{id}','ReporteController@region');

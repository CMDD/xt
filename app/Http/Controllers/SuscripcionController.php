<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suscripcion;
use App\Persona;
use Carbon\Carbon;

class SuscripcionController extends Controller
{

  public function __construct(){

    Carbon::setLocale('es');
  }

  Public function lista(){
    $nombre ='Suscriptores';
    $sus = Suscripcion::all();
    return view('admin.suscripcion.lista')->with('sus',$sus)
                                           ->with('nombre',$nombre);
  }
  public function crearSuscripcion(){
    return view('admin.suscripcion.crear');
  }

  public function crear(Request $request,$id){
     $fecha_final =  Carbon::parse($request->fecha_suscripcion);

     $persona = Persona::find($id);
      $sus = new Suscripcion();
      $sus->cantidad = $request->cantidad;
      $sus->oracional = $request->oracional;
      $sus->plan = $request->plan;
      $sus->fecha_inicio = $request->fecha_suscripcion;
      $sus->fecha_final = $fecha_final->addMonths((int)$request->plan);
      $sus->observacion = $request->observacion_suscripcion;
      $sus->persona_id = $persona->id;
      $sus->estado = 'Activo';

      if ($request->direccion_radio == 'misma') {
          $sus->nombre_recibe = $persona->nombres;
          $sus->direccion = $persona->direccion;
          $sus->direccion_especificacion = $persona->direccion_especificacion;
          $sus->ciudad = $persona->ciudad;
          $sus->pais = $persona->pais;

      }else{
        $sus->nombre_recibe = $request->nombre_recibe;
        $sus->direccion = $request->direccion_suscripcion;
        $sus->direccion_especificacion = $request->especificacion_direccion_suscripcion;
        $sus->ciudad = $request->ciudad_suscripcion;
        $sus->pais = $request->pais_suscripcion;
      }

      $sus->save();
      alert()->success('Suscripcion!', 'Creada')
      ->showConfirmButton('CERRAR','rgba(38, 185, 154, 0.59)');

      return back();

    }

    public function ver($id){
        $sus = Suscripcion::find($id);
        $carbon = Carbon::now();
        $quedan = $sus->fecha_final->diffForHumans();

        return view('admin.suscripcion.detalle')->with('sus',$sus)->with('quedan',$quedan);

    }



}

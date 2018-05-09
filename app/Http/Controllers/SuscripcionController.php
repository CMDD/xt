<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suscripcion;
use App\Persona;

class SuscripcionController extends Controller
{

  Public function lista(){
    $nombre ='Suscriptores';
    $personas=array();
    $sus = Suscripcion::all();

    foreach ($sus as $su) {
     $personas[] = Persona::find($su->persona_id);
    }

     return view('admin.suscripcion.lista')->with('personas',$personas)
                                           ->with('nombre',$nombre);
  }

  public function crear(Request $request,$id){

     $persona = Persona::find($id);
      $sus = new Suscripcion();
      $sus->cantidad = $request->cantidad;
      $sus->oracional = $request->oracional;
      $sus->plan = $request->plan;
      $sus->fecha_inicio = $request->fecha_suscripcion;
      $sus->observacion = $request->observacion;
      $sus->persona_id = $persona->id;

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

      return back();

    }

    public function ver($id){
        $sus = Suscripcion::where('persona_id',$id)->get();
        foreach ($sus as $su) {
           $fecha[] = $su->fecha_inicio;
           // $fecha_actual = strtotime ("$fecha - 1 day");
        }

        dd($fecha);
        return view('admin.suscripcion.suscripciones')->with('sus',$sus);

    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitularRequest;
use App\Suscripcion;
use App\Persona;
use Carbon\Carbon;
use Auth;

class SuscripcionController extends Controller
{

  public function __construct(){

    Carbon::setLocale('es');
  }



  Public function lista(){
    $nombre ='Suscriptores';
    $sus = Suscripcion::where('user_id',Auth::User()->id)->get();
    return view('admin.suscripcion.lista')->with('sus',$sus)
                                           ->with('nombre',$nombre);
  }
  public function crearSuscripcion(){
    return view('admin.suscripcion.crear');
  }

  public function store(Request $request){

    $titular = Persona::where('correo',$request->correo)->first();
     if ($titular) {
       // Crear suscripcion

       $fecha_final =  Carbon::parse($request->fecha);
       $sus = new Suscripcion();
       $sus->oracional = $request->oracional;
       $sus->plan = $request->plan;
       $sus->fecha_inicio = $request->fecha;
       $sus->fecha_final = $fecha_final->addMonth((int)$request->plan);
       $sus->persona_id = $titular->id;
       $sus->user_id = Auth::User()->id;
       $sus->estado = 'Activo';
       $sus->nombre_recibe = $request->nombre_recibe;
       $sus->direccion = $request->direccion;
       $sus->direccion_especificacion = $request->especificacion_direccion;
       $sus->ciudad = $request->ciudad;
       $sus->region = $request->region;
       $sus->telefono = $request->telefono;
       $sus->observacion = $request->observacion;
       $sus->save();

     }else{
       //Crear titular
       $persona = new Persona();
       $persona->estado = "Desactivo";
       $persona->nombres = $request->nombres;
       $persona->apellidos = $request->apellidos;
       $persona->correo = $request->correo;
       $persona->user_id = Auth::User()->id;
       $persona->save();
       // Crear suscripcion
       $fecha_final =  Carbon::parse($request->fecha);
       $sus = new Suscripcion();
       $sus->oracional = $request->oracional;
       $sus->plan = $request->plan;
       $sus->fecha_inicio = $request->fecha;
       $sus->fecha_final = $fecha_final->addMonth((int)$request->plan);
       $sus->persona_id = $persona->id;
       $sus->user_id = Auth::User()->id;
       $sus->estado = 'Activo';
       $sus->nombre_recibe = $request->nombre_recibe;
       $sus->direccion = $request->direccion;
       $sus->direccion_especificacion = $request->especificacion_direccion;
       $sus->ciudad = $request->ciudad;
       $sus->region = $request->region;
       $sus->telefono = $request->telefono;
       $sus->observacion = $request->observacion;
       $sus->save();

     }

     alert()->success('Suscripcion Creada!', 'Correctamente')
     ->showConfirmButton('Crear','rgba(38, 185, 154, 0.59)');

      return back();

  }
  public function edit($id){
    $sus = Suscripcion::find($id);
    return view('admin.suscripcion.editar')->with('sus',$sus);

  }

  public function update(Request $request,$id){
    $fecha_final =  Carbon::parse($request->fecha);
    $sus = Suscripcion::find($id);
    $sus->oracional = $request->oracional;
    $sus->plan = $request->plan;
    if ($request->fecha) {
      $sus->fecha_inicio = $request->fecha;
    }
    $sus->fecha_final = $fecha_final->addMonth((int)$request->plan);
    $sus->estado = $request->estado;
    $sus->nombre_recibe = $request->nombre_recibe;
    $sus->direccion = $request->direccion;
    $sus->direccion_especificacion = $request->especificacion_direccion;
    $sus->ciudad = $request->ciudad;
    $sus->region = $request->region;
    $sus->telefono = $request->telefono;
    $sus->observacion = $request->observacion;
    $sus->save();
    return redirect()->route('editar.suscripcion',$sus->id);


  }

  public function agregar(Request $request,$id){
    $persona = Persona::find($id);
    return view('admin.suscripcion.agregar')->with('persona',$persona);

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

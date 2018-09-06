<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitularRequest;
use App\Suscripcion;
use App\Persona;
use App\Region;
use Carbon\Carbon;
use Auth;

class SuscripcionController extends Controller
{

  public function __construct(){

    Carbon::setLocale('es');
  }



  Public function lista(){
    $nombre ='Suscriptores';
    $sus = Suscripcion::where('user_id',Auth::User()->id)->orderBy('id', 'DESC')->get();
    return view('admin.suscripcion.lista')->with('sus',$sus)
                                           ->with('nombre',$nombre);
  }
  public function crearSuscripcion(){
    $regiones = Region::all();
    return view('admin.suscripcion.crear')->with('regiones',$regiones);
  }

  public function store(Request $request){

    $titular = Persona::where('numero_documento',$request->cedula)->first();

     if ($titular) {
       // Crear suscripcion
       $fecha_final =  Carbon::parse($request->fecha);
       $sus = new Suscripcion();
       $sus->plan = $request->plan;
       $sus->fecha_inicio = $request->fecha;
       $sus->fecha_final = $request->fecha_corte;
       $sus->persona_id = (int)$titular->id;
       $sus->user_id = Auth::User()->id;
       $sus->estado = 'Activo';
       $sus->nombre_recibe = $request->nombre_recibe;
       $sus->direccion = $request->direccion;
       $sus->direccion_especificacion = $request->especificacion_direccion;
       $sus->municipio_id = (int)$request->municipio;
       $sus->region_id = (int)$request->region;
       $sus->telefono = $request->telefono;
       $sus->observacion = $request->observacion;
       $sus->jovenes = $request->jovenes;
       $sus->adultos = $request->adultos;
       $sus->ninos = $request->ninos;
       $sus->puerta = $request->puerta;
       $sus->save();
     }else{
       //Crear titular
       $persona = new Persona();
       $persona->estado = "Desactivo";
       $persona->nombres = $request->nombres;
       $persona->apellidos = $request->apellidos;
       $persona->correo = $request->correo;
       $persona->numero_documento = $request->cedula;
       $persona->user_id = Auth::User()->id;
       $persona->save();
       // Crear suscripcion
       $fecha_final =  Carbon::parse($request->fecha);
       $sus = new Suscripcion();
       $sus->plan = $request->plan;
       $sus->fecha_inicio = $request->fecha;
       $sus->fecha_final = $request->fecha_corte;
       $sus->persona_id = (int)$persona->id;
       $sus->user_id = Auth::User()->id;
       $sus->estado = 'Activo';
       $sus->nombre_recibe = $request->nombre_recibe;
       $sus->direccion = $request->direccion;
       $sus->direccion_especificacion = $request->especificacion_direccion;
       $sus->municipio_id = (int)$request->municipio;
       $sus->region_id = (int)$request->region;
       $sus->telefono = $request->telefono;
       $sus->observacion = $request->observacion;

       $sus->jovenes = (int)$request->jovenes;
       $sus->adultos = (int)$request->adultos;
       $sus->ninos = (int)$request->ninos;
       $sus->puerta = (int)$request->puerta;

       $sus->save();

     }
       alert()->success('Suscripcion Creada!', 'Correctamente')
       ->showConfirmButton('Crear','rgba(38, 185, 154, 0.59)');
     return back();

  }
  public function edit($id){
    $sus = Suscripcion::find($id);
    $regiones = Region::all();
    return view('admin.suscripcion.editar')->with('sus',$sus)->with('regiones',$regiones);

  }
  public function destroy($id){
    Suscripcion::destroy($id);
    alert()->success('Suscripcion Eliminada!', 'Correctamente');
    return back();

  }

  public function update(Request $request,$id){
    $fecha =  Carbon::parse($request->fecha);
    $sus = Suscripcion::find($id);
    $sus->plan = $request->plan;

    if ($request->fecha) {
      $sus->fecha_inicio = $fecha;
      $sus->fecha_final = $request->fecha_corte;
    }

    if ($request->fecha_corte) {
      $sus->fecha_final = $request->fecha_corte;
    }


    $sus->estado = $request->estado;
    $sus->nombre_recibe = $request->nombre_recibe;
    $sus->direccion = $request->direccion;
    $sus->direccion_especificacion = $request->especificacion_direccion;
    $sus->municipio_id = (int)$request->municipio;
    $sus->region_id = (int)$request->region;
    $sus->telefono = $request->telefono;
    $sus->observacion = $request->observacion;

    $sus->jovenes = (int)$request->jovenes;
    $sus->adultos = (int)$request->adultos;
    $sus->ninos = (int)$request->ninos;
    $sus->puerta = (int)$request->puerta;



    $sus->save();

    alert()->success('Suscripcion actualizada','CORRECTAMENTE');
    return redirect()->route('editar.suscripcion',$sus->id);


  }

  public function agregar(Request $request,$id){
    $persona = Persona::find($id);
    $regiones = Region::all();
    return view('admin.suscripcion.agregar')->with('persona',$persona)->with('regiones',$regiones);

  }

  public function crear(Request $request,$id){
     $fecha_final =  Carbon::parse($request->fecha_suscripcion);
     $persona = Persona::find($id);
      $sus = new Suscripcion();
      $sus->cantidad = $request->cantidad;
      $sus->oracional = $request->oracional;
      $sus->plan = $request->plan;
      $sus->fecha_inicio = $request->fecha_suscripcion;
      $sus->fecha_final = $request->fecha_corte;
      $sus->observacion = $request->observacion_suscripcion;
      $sus->persona_id = $persona->id;
      $sus->estado = 'Activo';
      if ($request->direccion_radio == 'misma') {
          $sus->nombre_recibe = $persona->nombres;
          $sus->direccion = $persona->direccion;
          $sus->direccion_especificacion = $persona->direccion_especificacion;
          $sus->municipio_id = (int)$request->municipio;
          $sus->region_id = (int)$request->region;

      }else{
        $sus->nombre_recibe = $request->nombre_recibe;
        $sus->direccion = $request->direccion_suscripcion;
        $sus->direccion_especificacion = $request->especificacion_direccion_suscripcion;
        $sus->municipio_id = (int)$request->municipio;
        $sus->region_id = (int)$request->region;
      }

      $sus->save();
      alert()->success('Suscripcion!', 'Creada')
      ->showConfirmButton('CERRAR','rgba(38, 185, 154, 0.59)');
      return back();

    }

    public function agregarSuscripcion(Request $request){
         $fecha =  Carbon::parse($request->fecha_suscripcion);
         $sus = new Suscripcion();
         $sus->plan = $request->plan;
         $sus->fecha_inicio = $fecha;
         $sus->fecha_final = $request->fecha_corte;
         $sus->observacion = $request->observacion_suscripcion;
         $sus->persona_id = (int)$request->persona_id;
         $sus->municipio_id = (int)$request->municipio;
         $sus->region_id = (int)$request->region;
         $sus->user_id = Auth::User()->id;
         $sus->estado = 'Activo';
         $sus->nombre_recibe = $request->nombre_recibe;
         $sus->telefono = $request->telefono;
         $sus->direccion = $request->direccion;
         $sus->direccion_especificacion = $request->especificacion_direccion;
         $sus->observacion = $request->observacion;

         $sus->jovenes = $request->jovenes;
         $sus->adultos = $request->adultos;
         $sus->ninos = $request->ninos;
         $sus->puerta = $request->puerta;

         $sus->save();
         alert()->success('Suscripcion creada','Correctamente');
         return back();
    }


    public function ver($id){
        $sus = Suscripcion::find($id);
        $carbon = Carbon::now();
        $quedan = $sus->fecha_final->diffForHumans();

        return view('admin.suscripcion.detalle')->with('sus',$sus)->with('quedan',$quedan);

    }



}

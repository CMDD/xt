<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitularRequest;
use App\Suscripcion;
use App\Persona;
use App\Region;
use App\Historial;
use Carbon\Carbon;
use Auth;
use Yajra\Datatables\Datatables;

class SuscripcionController extends Controller
{

  public function __construct(){

    Carbon::setLocale('es');
  }
  //METODOS VERSIÓN 2.0 IXTUS

  public function reporte(){
    return Suscripcion::all();
  }
  public function suscripciones(){
    $sus = Suscripcion::all();
      return Datatables::of($sus)
             ->addColumn('btn','centroc.partials.botones-suscripcion')
             ->addColumn('titular',function($query){
                return $query->persona['nombres'];
              })
             ->addColumn('cedula',function($query){
                return $query->persona['numero_documento'];
              })
             ->rawColumns(['btn','titular'])
             ->make(true);
  }
  public function suscripcion($id){
    $sus = Suscripcion::with('persona','municipio','region')
    ->where('id',$id)
    ->get();
    return  $sus;
  }
  public function actualizarSuscripcion(Request $request){
    $sus =Suscripcion::find($request->id);
    $sus->nombre_recibe = $request->nombre_recibe;
    $sus->direccion = $request->direccion;
    $sus->observacion = $request->observacion;
    $sus->jovenes = $request->jovenes;
    $sus->adultos = $request->adultos;
    $sus->ninos = $request->ninos;
    $sus->puerta = $request->puerta;
    $sus->numero_suscripcion = $request->numero_suscripcion;
    $sus->numero_factura = $request->numero_factura;
    $sus->punto_venta = $request->punto_venta;
    $sus->estado = $request->estado;
    $sus->save();

    return 200;
  }

  //FIN DE METODOSS


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
    $apartir_de =  Carbon::parse($request->apartir_de);
     if ($titular) {
       // Crear suscripcion
       $fecha_inicial =  Carbon::parse($request->fecha_pago);
       $sus = new Suscripcion();
       $sus->plan = $request->tiempo;
       $sus->fecha_inicio = $fecha_inicial;
       $sus->fecha_final = $apartir_de->addMonths((int)$request->tiempo);
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

       $sus->jovenes = (int)$request->jovenes;
       $sus->adultos = (int)$request->adultos;
       $sus->ninos = (int)$request->ninos;
       $sus->puerta = (int)$request->puerta;

       $sus->numero_suscripcion = $request->numero_suscripcion;
       $sus->numero_factura = $request->numero_factura;
       $sus->punto_venta = $request->punto;
       $sus->apartir_de = $apartir_de;
       $sus->envio_hasta = $apartir_de->addMonths((int)$request->tiempo);
       $sus->tipo = 'Nueva';
       $sus->save();
     }else{
       //Crear titular
       $persona = new Persona();
       $persona->estado = "Desactivo";
       $persona->nombres = $request->nombres;
       $persona->apellidos = $request->apellidos;
       $persona->fecha_nacimiento = $request->fecha_nacimiento;
       $persona->correo = $request->correo;
       $persona->tipo_documento = 'CC';
       $persona->numero_documento = $request->cedula;
       $persona->telefono = $request->telefono;
       $persona->user_id = Auth::User()->id;
       $persona->region_id = (int)$request->region;
       $persona->municipio_id = (int)$request->municipio;
       $persona->save();

       // Crear suscripcion
       $fecha_inicial =  Carbon::parse($request->fecha_pago);
       $sus = new Suscripcion();
       $sus->plan = $request->tiempo;
       $sus->fecha_inicio = $fecha_inicial;
       $sus->fecha_final = $apartir_de->addMonths((int)$request->tiempo);
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

       $sus->numero_suscripcion = $request->numero_suscripcion;
       $sus->numero_factura = $request->numero_factura;
       $sus->punto_venta = $request->punto;
       $sus->apartir_de = $apartir_de;
       $sus->envio_hasta = $apartir_de->addMonths((int)$request->tiempo);
       $sus->tipo = 'Nueva';


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
    }


    $sus->estado = $request->estado;
    $sus->nombre_recibe = $request->nombre_recibe;
    $sus->direccion = $request->direccion;
    $sus->direccion_especificacion = $request->especificacion_direccion;
    $sus->municipio_id = (int)$request->municipio;
    $sus->region_id = (int)$request->region;
    $sus->telefono = $request->telefono;
    $sus->observacion = $request->observacion;
    $sus->punto_venta = $request->punto;
    $sus->numero_factura = $request->numero_factura;
    $sus->numero_suscripcion = $request->numero_suscripcion;

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

    public function agregarMes(Request $request){
      $sus = Suscripcion::find($request->suscripcion);
      $sus->envio_hasta = $sus->envio_hasta->addMonths($request->mes);
      $sus->save();

      $historial = new Historial();
      $historial->asunto = 'Agregar mes';
      $historial->mensaje = 'Se ha agregado'.' '.$request->mes.' '.'M'. ' a la suscripcion';
      $historial->suscripcion_id = $sus->id;
      $historial->user_id = Auth::User()->id;
      $historial->save();

      return back();
    }
    public function renovar(Request $request){
      $sus = Suscripcion::find($request->suscripcion);
      $sus->envio_hasta = $sus->envio_hasta->addMonths($request->mes);
      $sus->fecha_final = $sus->fecha_final->addMonths($request->mes);
      $sus->save();

      $historial = new Historial();
      $historial->asunto = 'Renovación';
      $historial->mensaje = 'La suscripcion se ha renovado';
      $historial->suscripcion_id = $sus->id;
      $historial->user_id = Auth::User()->id;
      $historial->save();

      return back();
    }
  public function historial($id){
    $sus = Suscripcion::find($id);
    $historial = Historial::where('suscripcion_id',$id)->orderBy('created_at','DESC')->get();
    return view('admin.suscripcion.historial')->with('his',$historial)->with('sus',$sus);
  }

  public function guargarHistorial(Request $request,$id){
    $historial = new Historial();
    $historial->asunto = $request->asunto;
    $historial->mensaje = $request->mensaje;
    $historial->suscripcion_id = (int)$id;
    $historial->user_id = Auth::User()->id;
    $historial->save();
    return back();
}




}

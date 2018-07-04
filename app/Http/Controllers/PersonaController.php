<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterPersonaRequest;
use Illuminate\Support\Collection as Collection;
use App\Persona;
use App\Interes;
use App\TipoPersona;
use App\Suscripcion;
use App\Llamada;
use App\Direccion;
use App\Ciudad;
use App\Region;
use Storage;
use File;
use Auth;
use Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;

class PersonaController extends Controller
{
  public function __construct(){
    Carbon::setLocale('es');
  }
  public function index($audio='no'){
    $audio_url = Llamada::find($audio);
    $regiones = Region::all();
    if ($audio == 'no') {
    return view('admin.persona.crear')->with('regiones',$regiones);
    }

    return view('admin.persona.crear')->with('audio_url',$audio_url)
                                      ->with('ciudades',$ciudades)
                                      ->with('regiones',$regiones);
  }
     //Guardar en Base de Datos
  public function crear(RegisterPersonaRequest $request){
      $donacion =  urldecode($request['lista_donaciones']);
      $donaciones = json_decode($donacion);
      // alert()->success('Persona Creada!', 'Correctamente')
      // ->showConfirmButton('','rgba(38, 185, 154, 0.59)');
      // alert()->html('<p>CREADO CORRECTAMENTE</p>',
      // ' <a href="crear-suscripcion" >
      // <button type="button" class="btn btn-primary" name="button">Crear suscripción</button>
      // </a>
      // <a href="/" >
      // <button type="button" class="btn btn-primary" name="button">Crear persona</button>
      // </a>
      // ','success')->persistent(false,true);
      $lista_sus = urldecode($request['lista_sus']);
      $suscripciones = json_decode($lista_sus);
      $suscripcion_collection = Collection::make($suscripciones);
      $persona = new Persona();
      $persona->estado = "Activo";
      $persona->nombres = $request->nombres;
      $persona->apellidos = $request->apellidos;
      $persona->tipo_documento = $request->tipo_documento;
      $persona->numero_documento = $request->numero_documento;
      $persona->fecha_nacimiento = $request->fecha_nacimiento;
      $persona->correo = $request->correo;
      $persona->correo_alternativo = $request->correo_alternativo;
      $persona->direccion = $request->direccion;
      $persona->direccion_especificacion = $request->direccion_especificacion;
      $persona->numero_planilla = $request->numero_planilla;
      $persona->numero_registro = $request->numero_registro;
      $persona->ciudad = $request->ciudad;
      $persona->region = $request->region;
      $persona->user_id = Auth::User()->id;
      $persona->telefono = $request->telefono;
      $persona->telefono_alternativo = $request->telefono_alternativo;
      $persona->ocupacion = $request->ocupacion;
      if ($request->file('imagen')) {
          $persona->imagen = $request->file('imagen')->store('imagen');
      }
      if ($request->file('voz')) {
        $persona->voz = $request->file('voz')->store('voz');
      }else{
        $persona->voz = $request->voz;
      }
      $persona->save();
      $result_persona = Persona::where('correo',$persona->correo)->first();
      foreach ($request->preferencias as $key => $value) {
                $data = new Interes();
                $data->persona_id =$result_persona->id ;
                $data->nombre = $value;
                $data->save();
      }
      foreach ($request->tipo_persona as $key => $value) {
                $data = new TipoPersona();
                $data->persona_id =$result_persona->id ;
                $data->nombre = $value;
                $data->save();
      }
      //Suscripciones
      if ($request->direccion_radio == 'misma' or $request->direccion_radio == 'otra' ) {
        if ($request->direccion_radio == 'misma') {
          $fecha_final =  Carbon::parse($request->fecha_suscripcion);
          $sus = new Suscripcion();
          $sus->oracional = $request->oracional;
          $sus->plan = $request->plan;
          $sus->fecha_inicio = $request->fecha_suscripcion;
          $sus->fecha_final = $fecha_final->addMonth((int)$request->plan);
          $sus->persona_id = $result_persona->id;
          $sus->estado = 'Activo';
          $sus->nombre_recibe = $request->nombres;
          $sus->direccion = $request->direccion;
          $sus->direccion_especificacion = $request->direccion_especificacion;
          $sus->ciudad = $request->ciudad;
          $sus->region = $request->region;
          $sus->user_id = Auth::User()->id;
          $sus->telefono = $request->telefono;
          $sus->save();
        }else{
          foreach ($suscripcion_collection as $key => $dato) {
            $fecha_final =  Carbon::parse($request->fecha_suscripcion);
            $sus = new Suscripcion();
            $sus->oracional = $dato->oracional;
            $sus->plan = $dato->plan;
            $sus->fecha_inicio = $dato->fecha_suscripcion;
            $sus->fecha_final = $fecha_final->addMonth((int)$request->plan);
            $sus->persona_id = $result_persona->id;
            $sus->estado = 'Activo';
            $sus->nombre_recibe = $dato->nombre;
            $sus->direccion = $dato->direccion;
            $sus->direccion_especificacion = $dato->especificacion;
            $sus->ciudad = $dato->ciudad;
            $sus->region = $dato->region;
            $sus->telefono = $dato->telefono;
            $sus->user_id = Auth::User()->id;
            $sus->observacion = $dato->observacion;
            $sus->save();
          }
          }
        }
      //Fin suscripcion
      alert()->success('Persona Creada!', 'Correctamente')
      ->showConfirmButton('Crear','rgba(38, 185, 154, 0.59)');
      // ->footer('<a class="texto-alerta-footer" href="listar/General">Ver todas las personas creadas!</a>');
       return back();
    }

    public function actualizar(Request $request,$id){
      $lista_sus = urldecode($request['lista_sus']);
      $suscripciones = json_decode($lista_sus);
      $suscripcion_collection = Collection::make($suscripciones);
      $persona = Persona::find($id);
      $persona->estado = $request->estado;
      $persona->nombres = $request->nombres;
      $persona->apellidos = $request->apellidos;
      $persona->tipo_documento = $request->tipo_documento;
      $persona->numero_documento = $request->numero_documento;
      $persona->fecha_nacimiento = $request->fecha_nacimiento;
      $persona->correo = $request->correo;
      $persona->correo_alternativo = $request->correo_alternativo;
      $persona->direccion = $request->direccion;
      $persona->direccion_especificacion = $request->direccion_especificacion;
      $persona->numero_planilla = $request->numero_planilla;
      $persona->numero_registro = $request->numero_registro;
      $persona->ciudad = $request->ciudad;
      $persona->region = $request->region;
      $persona->telefono = $request->telefono;
      $persona->telefono_alternativo = $request->telefono_alternativo;
      $persona->ocupacion = $request->ocupacion;
      if ($request->file('imagen')) {
          $persona->imagen = $request->file('imagen')->store('imagen');
      }
      if ($request->file('voz')) {
        $persona->voz = $request->file('voz')->store('voz');
      }
      $persona->save();
      $result_persona = Persona::where('correo',$persona->correo)->first();
      if ($request->preferencias) {
        foreach ($request->preferencias as $key => $value) {
                  $data = new Interes();
                  $data->persona_id =$result_persona->id ;
                  $data->nombre = $value;
                  $data->save();
        }
      }
      if ($request->tipo_persona) {
        foreach ($request->tipo_persona as $key => $value) {
                  $data = new TipoPersona();
                  $data->persona_id =$result_persona->id ;
                  $data->nombre = $value;
                  $data->save();
        }
      }
      //Suscripciones
      if ($request->direccion_radio == 'misma' or $request->direccion_radio == 'otra' ) {
        if ($request->direccion_radio == 'misma') {
          $fecha_final =  Carbon::parse($request->fecha_suscripcion);
          $sus = new Suscripcion();
          $sus->oracional = $request->oracional;
          $sus->plan = $request->plan;
          $sus->fecha_inicio = $request->fecha_suscripcion;
          $sus->fecha_final = $fecha_final->addMonth((int)$request->plan);
          $sus->persona_id = $result_persona->id;
          $sus->user_id = Auth::User()->id;
          $sus->estado = 'Activo';
          $sus->nombre_recibe = $request->nombres;
          $sus->direccion = $request->direccion;
          $sus->direccion_especificacion = $request->direccion_especificacion;
          $sus->ciudad = $request->ciudad;
          $sus->region = $request->region;
          $sus->telefono = $request->telefono;
          $sus->save();
        }else{
          foreach ($suscripcion_collection as $key => $dato) {
            $fecha_final =  Carbon::parse($request->fecha_suscripcion);
            $sus = new Suscripcion();
            $sus->oracional = $dato->oracional;
            $sus->plan = $dato->plan;
            $sus->fecha_inicio = $dato->fecha_suscripcion;
            $sus->fecha_final = $fecha_final->addMonth((int)$request->plan);
            $sus->persona_id = $result_persona->id;
            $sus->user_id = Auth::User()->id;
            $sus->estado = 'Activo';
            $sus->nombre_recibe = $dato->nombre;
            $sus->direccion = $dato->direccion;
            $sus->direccion_especificacion = $dato->especificacion;
            $sus->ciudad = $dato->ciudad;
            $sus->region = $dato->region;
            $sus->telefono = $dato->telefono;
            $sus->observacion = $dato->observacion;
            $sus->save();
          }
          }
        }
      //Fin suscripcion


      alert()->success('Actualizado!', 'Correctamente')
      ->showConfirmButton('CERRAR','rgba(38, 185, 154, 0.59)');
      return back();
    }
    public function listar($nombre){
      $nombre = $nombre;
      $personas=array();
      if ($nombre=='General'){
          $nombre = "General";
          $personas=Persona::orderBy('id', 'DESC')->where('user_id',Auth::User()->id)->get();
      return view('admin.persona.listar')->with('personas',$personas)->with('nombre',$nombre);
      }
        $tipos = TipoPersona::where('nombre',$nombre)->get();
        foreach ($tipos as $tipo) {
        $personas[] = Persona::find($tipo->persona_id);
      }
      return view('admin.persona.listar')->with('personas',$personas)->with('nombre',$nombre);
    }

    public function detalle($id){
      $persona = Persona::find($id);
      $tipo_personas = TipoPersona::where('persona_id',$id)->get();
      $interes = Interes::where('persona_id',$id)->get();
      $suscripciones = Suscripcion::where('persona_id',$id)->get();
      return view('admin.persona.detalle')->with('persona',$persona)
                                          ->with('tipo_personas',$tipo_personas)
                                          ->with('interes',$interes)
                                          ->with('suscripciones',$suscripciones);
    }

    public function editar($id){
      $persona = Persona::find($id);
      $tipo_personas = TipoPersona::where('persona_id',$id)->get();
      $interes = Interes::where('persona_id',$id)->get();
      $suscripciones = Suscripcion::where('persona_id',$id)->get();
      return view('admin.persona.editar')->with('persona',$persona)
                                          ->with('tipo_personas',$tipo_personas)
                                          ->with('interes',$interes)
                                          ->with('suscripciones',$suscripciones);
    }
    public function eliminarTipo($id){
      $tipo=TipoPersona::find($id);
      $tipo->delete();
      alert()->success('Tipo eliminado','Correctamente');
      return back();
    }
    public function eliminarInteres($id){
      $tipo=Interes::find($id);
      $tipo->delete();
      alert()->success('Preferencia eliminada', 'Correctamente');
      return back();
    }

}

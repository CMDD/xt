<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterPersonaRequest;
use App\Persona;
use App\Interes;
use App\TipoPersona;
use Storage;
use File;
use Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PersonaController extends Controller
{

    public function crear(RegisterPersonaRequest $request){
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
      $persona->ciudad = $request->ciudad;
      $persona->pais = $request->pais;
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
      alert()->success('Persona Creada!', 'Correctamente')
      ->showConfirmButton('Crear nueva','rgba(38, 185, 154, 0.59)')
      ->footer('<a class="texto-alerta-footer" href="listar/General">Ver todas las personas creadas!</a>');
      return back();

    }
    public function actualizar(RegisterPersonaRequest $request,$id){
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
      $persona->ciudad = $request->ciudad;
      $persona->pais = $request->pais;
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


      alert()->success('Actualizado!', 'Correctamente')
      ->showConfirmButton('CERRAR','rgba(38, 185, 154, 0.59)');
      return back();

    }

    public function listar($nombre){
      $nombre = $nombre;
      $personas=array();
      if ($nombre=='General') {
        $nombre = "General";
          $personas=Persona::orderBy('id', 'DESC')->get();
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
      return view('admin.persona.detalle')->with('persona',$persona)
                                          ->with('tipo_personas',$tipo_personas)
                                          ->with('interes',$interes);
    }

    public function editar($id){
      $persona = Persona::find($id);
      $tipo_personas = TipoPersona::where('persona_id',$id)->get();
      $interes = Interes::where('persona_id',$id)->get();
      return view('admin.persona.editar')->with('persona',$persona)
                                          ->with('tipo_personas',$tipo_personas)
                                          ->with('interes',$interes);
    }

    public function eliminarTipo($id){
      $tipo=TipoPersona::find($id);
      $tipo->delete();
      alert()->success('Tipo eliminado', 'Correctamente');

      return back();
    }
    public function eliminarInteres($id){
      $tipo=Interes::find($id);
      $tipo->delete();
      alert()->success('Preferencia eliminada', 'Correctamente');
      return back();
    }

}

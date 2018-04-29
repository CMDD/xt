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

class PersonaController extends Controller
{

    public function crear(RegisterPersonaRequest $request){

      $persona = new Persona();
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
      $persona->imagen = $request->file('imagen')->store('imagen');
      $persona->voz = $request->file('voz')->store('voz');
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
      dd('verificar');
    }

    public function listar($nombre){
      $personas=array();
      if ($nombre=='General') {
         $personas=Persona::all();
      return view('admin.persona.listar')->with('personas',$personas);
      }
      $tipos = TipoPersona::where('nombre',$nombre)->get();
        foreach ($tipos as $tipo) {
        $personas[] = Persona::find($tipo->persona_id);
      }
      return view('admin.persona.listar')->with('personas',$personas)->with('tipos',$tipos);
    }

}

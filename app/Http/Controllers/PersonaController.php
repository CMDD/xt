<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterPersonaRequest;
use App\Persona;
use App\Interes;

class PersonaController extends Controller
{

    public function crear(RegisterPersonaRequest $request){
      $persona = new Persona();
      $persona->nombre = $request->nombres;
      $persona->correo = $request->correo;
      $persona->save();
      $result_persona = Persona::where('correo',$persona->correo)->first();
      foreach ($request->tipo_persona as $key => $value) {
                $data = new Interes();
                $data->persona_id =$result_persona->id ;
                $data->nombre = $value;
                $data->save();
      }
      dd('verificar');
    }


    public function listar(){
      $result_persona = Persona::find(1);
      $intereses = Interes::where('nombre','Benefactor')->get()->count();

      return view('admin.persona.listar');
    }
}

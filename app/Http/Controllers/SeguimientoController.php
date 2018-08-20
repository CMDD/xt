<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Nota;
use Carbon\Carbon;
use Auth;

class SeguimientoController extends Controller
{
  public function __construct(){

    Carbon::setLocale('es');
  }
    public function index($id){
      $persona = Persona::find($id);
      $notas = Nota::where('persona_id',$id)->orderBy('id', 'DESC')->get();
      return view('admin.persona.historial')->with('persona',$persona)
                                              ->with('notas',$notas);
    }
    public function crearNota(Request $request,$id){
      $nota = new Nota();
      $nota->asunto = $request->asunto;
      $nota->mensaje = $request->mensaje;
      $nota->persona_id = $id;
      $nota->user_id = Auth::User()->id;
      $nota->save();
      alert()->success('Nota Creada','Correctamente.')->autoClose(5000);
      return back();
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donacion;
use App\Persona;
use Auth;

class DonacionController extends Controller
{
    public function crear(){

      return view('admin.donacion.crear');
    }


    public function store(Request $request){
      if ($request->correo) {
        $persona = new Persona();
        $persona->nombres = $request->nombre;
        $persona->estado = 'Desactivo';
        $persona->correo = $request->correo;
        $persona->user_id = Auth::User()->id;
        $persona->save();
      }

      $donacion = new Donacion();
      $donacion->nombre_benefactor = $request->nombre;
      $donacion->estado = 'Activo';
      $donacion->valor = $request->valor;
      $donacion->recibo_pago = $request->recibo_pago;
      $donacion->fecha = $request->fecha;
      $donacion->telefono = $request->telefono;
      $donacion->celular = $request->celular;
      $donacion->programa = $request->programa;
      $donacion->direccion = $request->direccion;
      $donacion->region = $request->region;
      $donacion->ciudad = $request->ciudad;
      $donacion->periocidad = $request->periocidad;
      $donacion->observacion = $request->observacion;
      $donacion->user_id = Auth::User()->id;
      if ($request->correo) {
        $donacion->persona_id = $persona->id;
      }
      $donacion->save();
      alert()->success('Donación Creada!', 'Correctamente')
      ->showConfirmButton('Cerrar','rgba(38, 185, 154, 0.59)');
      return back();
    }

    public function listar(){
      $donaciones = Donacion::where('user_id',Auth::User()->id)->get();
      return view('admin.donacion.lista')->with('donaciones',$donaciones);
    }


    public function edit(Donacion $donacion){
      return view('admin.donacion.editar',compact('donacion'));
    }
    public function update(Request $request,$id){
      $donacion = Donacion::find($id);
      $donacion->nombre_benefactor = $request->nombre;
      $donacion->estado = $request->estado;
      $donacion->valor = $request->valor;
      $donacion->recibo_pago = $request->recibo_pago;
      $donacion->fecha = $request->fecha;
      $donacion->telefono = $request->telefono;
      $donacion->celular = $request->celular;
      $donacion->programa = $request->programa;
      $donacion->direccion = $request->direccion;
      $donacion->region = $request->region;
      $donacion->ciudad = $request->ciudad;
      $donacion->periocidad = $request->periocidad;
      $donacion->observacion = $request->observacion;
      $donacion->save();
      alert()->success('Donación Actualizada!', 'Correctamente')
      ->showConfirmButton('Cerrar','rgba(38, 185, 154, 0.59)');
      return redirect()->route('editar.donaciones',$donacion->id);
    }

    public function ver(Donacion $donacion){

      return view('admin.donacion.detalle',compact('donacion'));
    }
    public function destroy($id){
      $donacion = Donacion::find($id);
      $donacion->delete();
      alert()->success('Donación Eliminada!', 'Correctamente')
      ->showConfirmButton('Cerrar','rgba(38, 185, 154, 0.59)');
      return redirect()->route('listar.donaciones');
    }
}

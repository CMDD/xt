<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TitularRequest;
use App\Donacion;
use App\Persona;
use App\Region;
use Auth;

class DonacionController extends Controller
{
    public function crear(){
      $regiones = Region::all();
      return view('admin.donacion.crear')->with('regiones',$regiones);
    }


    public function store(Request $request){
      $persona = Persona::where('correo',$request->correo)->first();
      if ($persona) {
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
        $donacion->region_id = $request->region;
        $donacion->municipio_id = $request->municipio;
        $donacion->periocidad = $request->periocidad;
        $donacion->observacion = $request->observacion;
        $donacion->correo = $request->correo;
        $donacion->user_id = Auth::User()->id;
        $donacion->persona_id = $persona->id;
        $donacion->save();
      }else{

        if ($request->correo){
          $persona = new Persona();
          $persona->nombres = $request->nombre;
          $persona->apellidos = $request->apellido;
          $persona->estado = 'Desactivo';
          $persona->correo = $request->correo;
          $persona->user_id = Auth::User()->id;
          $persona->telefono = $request->telefono;
          $persona->region_id = $request->region;
          $persona->municipio_id = $request->municipio;
          $persona->save();
        }
        $donacion = new Donacion();
        $donacion->nombre_benefactor = $request->nombre;
        $donacion->estado = 'Activo';
        $donacion->valor = $request->valor;
        $donacion->recibo_pago = $request->recibo_pago;
        $donacion->fecha = $request->fecha;
        $donacion->telefono = $request->telefono;
        $donacion->correo = $request->correo;
        $donacion->celular = $request->celular;
        $donacion->programa = $request->programa;
        $donacion->direccion = $request->direccion;
        $donacion->region_id = $request->region;
        $donacion->municipio_id = $request->municipio;
        if ($request->correo) {
            $donacion->persona_id = $persona->id;
        }
        $donacion->periocidad = $request->periocidad;
        $donacion->observacion = $request->observacion;
        $donacion->user_id = Auth::User()->id;
        $donacion->save();
      }
      alert()->success('Donación Creada!', 'Correctamente')
      ->showConfirmButton('Cerrar','rgba(38, 185, 154, 0.59)');
      return back();
    }

    public function listar(){
      $donaciones = Donacion::where('user_id',Auth::User()->id)->orderBy('id', 'DESC')->get();
      return view('admin.donacion.lista')->with('donaciones',$donaciones);
    }


    public function edit(Donacion $donacion){
      $regiones = Region::all();
      return view('admin.donacion.editar',compact('donacion'))->with('regiones',$regiones);
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
      $donacion->region_id = $request->region;
      $donacion->municipio_id = $request->municipio;
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

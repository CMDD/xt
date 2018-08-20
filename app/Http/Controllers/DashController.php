<?php

namespace App\Http\Controllers;
use App\Persona;
use App\Interes;
use App\TipoPersona;
use App\Suscripcion;
use App\Donacion;
use App\Notificacion;
use App\User;
use Auth;


use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index(){

      $lideres = User::where('region_id',Auth::User()->region_id)->get();

      $count_personas = Persona::count();
      $count_suscripcion = Suscripcion::count();
      $count_donacion = Donacion::count();
      $notis = Notificacion::all();
      \Session::put('noti', Notificacion::count());
      \Session::put('notis', $notis);
      \Session::put('lideres', $lideres);

        //Valores nacionales Titulares
      $total = Persona::count();
      $titular_activo = Persona::where('estado','Activo')->count();
      $titular_desactivo = Persona::where('estado','Desactivo')->count();

      $oyente = TipoPersona::where('nombre','Oyente')->count();
      $cliente = TipoPersona::where('nombre','Cliente')->count();
      $alumno = TipoPersona::where('nombre','Alumno')->count();
      $asistente = TipoPersona::where('nombre','Asistente')->count();
      $servidor = TipoPersona::where('nombre','Servidor')->count();
      $proveedor = TipoPersona::where('nombre','Proveedor')->count();
      $suscriptor = TipoPersona::where('nombre','Suscriptor')->count();
      $benefactor = TipoPersona::where('nombre','Benefactor')->count();
      $empleado = TipoPersona::where('nombre','Empleado')->count();

      $suscripciones = Suscripcion::count();
      $sus_activo= Suscripcion::where('estado','Activo')->count();
      $sus_desactivo= Suscripcion::where('estado','Desactivo')->count();
      $don_activo= Donacion::where('estado','Activo')->count();
      $don_desactivo= Donacion::where('estado','Desactivo')->count();
      $donaciones = Donacion::count();

      $totales = [
          'total' => $total,
          'oyente' => $oyente,
          'cliente' => $cliente,
          'alumno' => $alumno,
          'asistente' => $asistente,
          'servidor' => $servidor,
          'proveedor' => $proveedor,
          'suscriptor' => $suscriptor,
          'benefactor' => $benefactor,
          'empleado' => $empleado,
          'suscripciones'=> $suscripciones,
          'sus_activo'=> $sus_activo,
          'sus_desactivo'=> $sus_desactivo,
          'donaciones' => $donaciones,
          'don_activo' => $don_activo,
          'don_desactivo' => $don_desactivo,
          'titular_activo' => $titular_activo,
          'titular_desactivo' => $titular_desactivo,
      ];


      return view('admin.dashboard')
      ->with('count_personas',$count_personas)
      ->with('count_suscripcion',$count_suscripcion)
      ->with('count_donacion',$count_donacion)
      ->with('totales',$totales)
      ->with('lideres',$lideres);
    }
}

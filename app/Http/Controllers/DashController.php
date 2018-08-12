<?php

namespace App\Http\Controllers;
use App\Persona;
use App\Interes;
use App\TipoPersona;
use App\Suscripcion;
use App\Donacion;
use App\Notificacion;


use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index(){
      $count_personas = Persona::count();
      $count_suscripcion = Suscripcion::count();
      $count_donacion = Donacion::count();
      $notis = Notificacion::all();
      \Session::put('noti', Notificacion::count());
      \Session::put('notis', $notis);



        //Valores nacionales
      $total = Persona::count();
      $oyente = TipoPersona::where('nombre','Oyente')->count();
      $cliente = TipoPersona::where('nombre','Cliente')->count();
      $alumno = TipoPersona::where('nombre','Alumno')->count();
      $asistente = TipoPersona::where('nombre','Asistente')->count();
      $servidor = TipoPersona::where('nombre','Servidor')->count();
      $proveedor = TipoPersona::where('nombre','Proveedor')->count();
      $suscriptor = TipoPersona::where('nombre','Suscriptor')->count();
      $benefactor = TipoPersona::where('nombre','Benefactor')->count();
      $empleado = TipoPersona::where('nombre','Empleado')->count();
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
          'empleado' => $empleado
      ];


      return view('admin.dashboard')
      ->with('count_personas',$count_personas)
      ->with('count_suscripcion',$count_suscripcion)
      ->with('count_donacion',$count_donacion)
      ->with('totales',$totales);
    }
}

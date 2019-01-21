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
      // $count_personas = Persona::count();
      // $count_suscripcion = Suscripcion::count();
      // $count_donacion = Donacion::count();
      $notis = Notificacion::paginate(10);
      \Session::put('noti', Notificacion::count());
      \Session::put('notis', $notis);
        //Valores nacionales Titulares
      // $total = Persona::count();
      // $personas = Persona::where('estado','Activo')->get();
      // $titular_desactivo = Persona::where('estado','Desactivo')->count();
      // $titular_activo = $personas->count();

      // $oyente=0;
      // $cliente=0;
      // $alumno =0;
      // $asistente=0;
      // $servidor=0;
      // $proveedor=0;
      // $suscriptor=0;
      // $benefactor=0;
      // $empleado=0;


      // foreach($personas as $to){
      //   $oyentes = TipoPersona::where('nombre','Oyente')->where('persona_id',$to->id)->count();
      //   $clientes = TipoPersona::where('nombre','Cliente')->where('persona_id',$to->id)->count();
      //   $alumnos = TipoPersona::where('nombre','Alumno')->where('persona_id',$to->id)->count();
      //   $asistentes = TipoPersona::where('nombre','Asistente')->where('persona_id',$to->id)->count();
      //   $servidores = TipoPersona::where('nombre','Servidor')->where('persona_id',$to->id)->count();
      //   $proveedores = TipoPersona::where('nombre','Proveedor')->where('persona_id',$to->id)->count();
      //   $suscriptores  = TipoPersona::where('nombre','Suscriptor')->where('persona_id',$to->id)->count();
      //   $benefactores  = TipoPersona::where('nombre','Benefactor')->where('persona_id',$to->id)->count();
      //   $empleados  = TipoPersona::where('nombre','Empleado')->where('persona_id',$to->id)->count();
      //   if ($oyentes > 0) {
      //     $oyente = $oyente +1;
      //   }
      //   if ($clientes > 0) {
      //     $cliente = $cliente +1;
      //   }
      //   if ($alumnos > 0) {
      //     $alumno = $alumno +1;
      //   }
      //   if ($asistentes > 0) {
      //     $asistente =$asistente +1;
      //   }
      //   if ($servidores > 0) {
      //     $servidor =  $servidor +1;
      //   }
      //   if ($proveedores > 0) {
      //     $proveedor =  $proveedor +1;
      //   }
      //   if ($suscriptores  > 0) {
      //     $suscriptor = $suscriptor +1;
      //   }
      //   if ($benefactores  > 0) {
      //     $benefactor = $benefactor +1;
      //   }
      //   if ($empleados  > 0) {
      //     $empleado = $empleado +1;
      //   }
      // }



      // $oyente = TipoPersona::where('nombre','Oyente')->count();
      // $cliente = TipoPersona::where('nombre','Cliente')->count();
      // $alumno = TipoPersona::where('nombre','Alumno')->count();
      // $asistente = TipoPersona::where('nombre','Asistente')->count();
      // $servidor = TipoPersona::where('nombre','Servidor')->count();
      // $proveedor = TipoPersona::where('nombre','Proveedor')->count();
      // $suscriptor = TipoPersona::where('nombre','Suscriptor')->count();
      // $benefactor = TipoPersona::where('nombre','Benefactor')->count();
      // $empleado = TipoPersona::where('nombre','Empleado')->count();

      // $suscripciones = Suscripcion::count();
      // $sus_activo= Suscripcion::where('estado','Activo')->count();
      // $sus_desactivo= Suscripcion::where('estado','Desactivo')->count();
      // $don_activo= Donacion::where('estado','Activo')->count();
      // $don_desactivo= Donacion::where('estado','Desactivo')->count();
      // $donaciones = Donacion::count();

      // $totales = [
      //     'total' => $total,
      //     'oyente' => $oyente,
      //     'cliente' => $cliente,
      //     'alumno' => $alumno,
      //     'asistente' => $asistente,
      //     'servidor' => $servidor,
      //     'proveedor' => $proveedor,
      //     'suscriptor' => $suscriptor,
      //     'benefactor' => $benefactor,
      //     'empleado' => $empleado,
      //     'suscripciones'=> $suscripciones,
      //     'sus_activo'=> $sus_activo,
      //     'sus_desactivo'=> $sus_desactivo,
      //     'donaciones' => $donaciones,
      //     'don_activo' => $don_activo,
      //     'don_desactivo' => $don_desactivo,
      //     'titular_activo' => $titular_activo,
      //     'titular_desactivo' => $titular_desactivo,
      // ];
      return view('admin.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  Illuminate\Support\Collection as Collection;
use App\Persona;
use App\Suscripcion;
use App\Donacion;
use App\TipoPersona;
use App\Region;
use Carbon\Carbon;
use Reporte\Reporte;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class ReporteController extends Controller
{
    public function titularNacional(){
      $nombre = 'Base de datos nacional';
      $personas = Persona::all();
      return view('admin.persona.listar')->with('personas',$personas)
                                         ->with('nombre',$nombre);
    }

    public function suscripciones(){
      $sus = Suscripcion::all();
      return view('admin.reporte.suscripciones')->with('sus',$sus);
    }

    public function donaciones(){
      $donaciones = Donacion::all();
      return view('admin.reporte.donaciones')->with('donaciones',$donaciones);
    }

    public function index(){
      $regiones = Region::all();
      return view('admin.reporte.index')->with('regiones',$regiones);
    }

    public function reporteTitulares(Request $request){
      if ($request->accion == 'Descargar' and $request->tipo == 'listado') {
          $result = (new Reporte)->descargarTitulares($request);
      }else{
          $result = (new Reporte)->reporteTirulares($request);
      }
      return $result;
    }

    public function reporteSuscripciones(Request $request){
      if ($request->accion == 'Descargar' and $request->tipo == 'listado'){
          $result = (new Reporte)->descargarSuscripciones($request);
      }else {
          $result = (new Reporte)->verSuscripciones($request);
      }
      return $result;
    }
    public function reporteDonaciones(Request $request){
      if ($request->accion == 'Descargar' and $request->tipo == 'listado'){
          $result = (new Reporte)->descargarDonaciones($request);
      }else {
          $result = (new Reporte)->verDonaciones($request);
      }
      return $result;
    }

    public function parametros(){
      return view('admin.reporte.index')->with('regiones',$regiones);
    }

    public function totales(){
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
      $valores = [
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
      return view('admin.reporte.totales')->with('valores',$valores);
    }

    public function reporteRegional($reporte){
      if ($reporte == 'Personas') {
        $nombre = 'Base de datos regional';
        $personas = Persona::where('region_id',Auth::User()->region_id)->get();
        return view('admin.persona.listar')->with('personas',$personas)
                                           ->with('nombre',$nombre);
      }elseif ($reporte == 'Suscripciones') {
        $sus = Suscripcion::where('region_id',Auth::User()->region_id)->get();
        return view('admin.reporte.suscripciones')->with('sus',$sus);
      }elseif ($reporte == 'Donaciones') {
        $donaciones = Donacion::where('region_id',Auth::User()->region_id)->get();
        return view('admin.reporte.donaciones')->with('donaciones',$donaciones);
      }
    }



}

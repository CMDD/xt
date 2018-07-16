<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  Illuminate\Support\Collection as Collection;
use App\Persona;
use App\Suscripcion;
use App\Donacion;
use App\TipoPersona;

class ReporteController extends Controller
{
    public function titularNacional(){
      $nombre = 'Base de datos nacional';
      $personas = Persona::all();
      return view('admin.persona.listar')
      ->with('personas',$personas)
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

      return view('admin.reporte.index');
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

      

      $totales = Collection::make($valores);


      return view('admin.reporte.totales')->with('totales',$totales);
    }
}
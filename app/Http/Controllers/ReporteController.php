<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Suscripcion;
use App\Donacion;

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
}

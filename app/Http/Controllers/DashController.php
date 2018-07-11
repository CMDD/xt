<?php

namespace App\Http\Controllers;
use App\Persona;
use App\Interes;
use App\TipoPersona;
use App\Suscripcion;
use App\Donacion;


use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index(){
      $count_personas = Persona::count();
      $count_suscripcion = Suscripcion::count();
      $count_donacion = Donacion::count();
      return view('admin.dashboard')
      ->with('count_personas',$count_personas)
      ->with('count_suscripcion',$count_suscripcion)
      ->with('count_donacion',$count_donacion);
    }
}

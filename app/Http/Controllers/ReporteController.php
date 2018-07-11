<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class ReporteController extends Controller
{
    public function titularNacional(){
      $nombre = 'Base de datos nacional';
      $personas = Persona::all();
      return view('admin.persona.listar')
      ->with('personas',$personas)
      ->with('nombre',$nombre);
    }
}

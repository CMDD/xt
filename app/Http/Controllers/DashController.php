<?php

namespace App\Http\Controllers;
use App\Persona;
use App\Interes;
use App\TipoPersona;


use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index(){
      $count_personas = Persona::count();
      $count_benefactor = TipoPersona::where('nombre','Benefactor')->count();
      $count_empleados = TipoPersona::where('nombre','Empleado')->count();
      $count_servidores = TipoPersona::where('nombre','Servidores')->count();
      $count_clientes = TipoPersona::where('nombre','Cliente')->count();
      $count_proveedores = TipoPersona::where('nombre','Proveedor')->count();

      return view('admin.dashboard')->with('count_personas',$count_personas)
                                    ->with('count_benefactor',$count_benefactor)
                                    ->with('count_empleados',$count_empleados)
                                    ->with('count_servidores',$count_servidores)
                                    ->with('count_clientes',$count_clientes)
                                    ->with('count_proveedores',$count_proveedores);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Departamento;

class RegionController extends Controller
{

    public function cargarMunicipios($id){
      $ciudades = Ciudad::where('departamento_id',$id)->get();
      return $ciudades;
    }
    public function cargarDepartamentos($id){
      $departamentos = Departamento::where('region_id',$id)->get();
      return $departamentos;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;

class RegionController extends Controller
{

    public function cargarCiudades($id){
      $ciudades = Ciudad::where('region_id',$id)->get();
      return $ciudades;
    }
}

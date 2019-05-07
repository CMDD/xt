<?php

namespace App\Http\Controllers\Contacto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suscripcion;

class ReporteController extends Controller
{


    // Suscripcion
    public function suscripcionesTotal(){
        return Suscripcion::count();
    }
    public function suscripcionesActivas(){
        return Suscripcion::where('estado','Activo')->count();
    }
    public function suscripcionesDesactivas(){
        return Suscripcion::where('estado','Desactivo')->count();
    }
}

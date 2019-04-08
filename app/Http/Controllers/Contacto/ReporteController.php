<?php

namespace App\Http\Controllers\Contacto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suscripcion;

class ReporteController extends Controller
{
    public function suscripciones(){
        return Suscripcion::all();
    }
}

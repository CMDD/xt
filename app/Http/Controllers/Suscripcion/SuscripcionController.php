<?php

namespace App\Http\Controllers\Suscripcion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

use App\Suscripcion;

class SuscripcionController extends Controller
{
    //Web
    public function viewNacional(){
        return view('ixtus.suscripcion.nacional');
    }


    // Api
    public function nacional(){
       $suscripciones = Suscripcion::all();
      return Datatables::of($suscripciones)
             ->addColumn('btn','ixtus.partials.botones_suscripcion')
             ->addColumn('titular',function($suscripciones){
               return $suscripciones->persona->nombres;
             })
             ->addColumn('cedula',function($suscripciones){
               return $suscripciones->persona->numero_documento;
             })
             ->rawColumns(['btn'])
             ->make(true);
    }
}

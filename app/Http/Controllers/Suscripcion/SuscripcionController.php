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
    public function nacional($data){
       $suscripciones = Suscripcion::all();

       if ($data==2) {
              return Datatables::of($suscripciones)
            ->addColumn('btn', function ($suscripciones) {
                return '
                <a class="btn btn-primary btn-sm"  href="suscripcion/' . $suscripciones->id . '">
                  <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-danger btn-sm"  href="eliminar_suscripcion/' . $suscripciones->id . '"  onclick="return confirm(\'¿ Desea eliminar el registro seleccionado ?\')">
                  <i class="fa fa-trash"></i>
                </a>';
            })
             ->addColumn('titular',function($suscripciones){
               return $suscripciones->persona['nombres'];
             })
             ->addColumn('cedula',function($suscripciones){
               return $suscripciones->persona['numero_documento'];
             })

             ->rawColumns(['btn'])
             ->make(true);
            } else {

                return Datatables::of($suscripciones)
                //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
                ->addColumn('btn', function ($suscripciones) {
                return '
                <a class="btn btn-primary btn-sm"  href="suscripcion/' . $suscripciones->id . '">
                  <i class="fa fa-eye"></i>
                </a>';
                })
                ->addColumn('titular',function($suscripciones){
                return $suscripciones->persona['nombres'];
                })
                ->addColumn('cedula',function($suscripciones){
                return $suscripciones->persona['numero_documento'];
                })

                ->rawColumns(['btn'])
                ->make(true);
            }
      
      
      
    }
}

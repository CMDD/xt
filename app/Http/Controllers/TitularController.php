<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use Yajra\Datatables\Datatables;

class TitularController extends Controller
{
    public function getTitulares(){

      $personas = Persona::all();
       return datatables()->of($personas)
       ->addColumn('btn','admin.datatables.botones')
       ->rawColumns(['btn'])
       ->toJson();
    }
    public function showTitulares(){
      return view('admin.datatables.lista');
    }


    //METODOS VERSION V.2.0
    public function titulares(){
      $titulares = Persona::all();
      return Datatables::of($titulares)
             ->addColumn('btn','centroc.partials.botones-titulares')
             ->rawColumns(['btn'])
             ->make(true);
    }
    public function titular($id){
      $titular = Persona::where('region_id',$id);
      return Datatables::of($titular)
             ->addColumn('btn','centroc.partials.botones-titulares')
             ->rawColumns(['btn'])
             ->make(true);
    }



}

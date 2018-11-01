<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

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



}

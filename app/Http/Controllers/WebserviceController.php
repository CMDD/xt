<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class WebserviceController extends Controller
{


    public function create(Request $request){
        $persona = new Persona();
        return 'Recibido desde ixtus';
    }


}

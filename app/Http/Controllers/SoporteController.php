<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SoporteMail;
use Mail;

class SoporteController extends Controller
{
    public function general(Request $request){
      Mail::to($request->usuario,'IXTUS')
      ->send(new SoporteMail($request));

      alert()->success('Correo  Enviado!', 'Correctamente');
      return back();

    }
}

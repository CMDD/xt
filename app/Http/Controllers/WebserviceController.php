<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Mail\AutorizacionMail;
use Mail;

class WebserviceController extends Controller
{


    public function create(Request $request){

      $persona = Persona::where('numero_documento',$request->cedula)->first();

      if ($persona) {

        // if ($persona->estado == 'Activo') {
        //
        //   return back();
        // }else{
        //   $persona->estado = 'Activo';
        //   $persona->nombres = $request->nombres;
        //   $persona->apellidos = $request->apellidos;
        //   $persona->correo = $request->email;
        //   $persona->user_id = 1;
        //   $persona->numero_planilla = $request->ip;
        //   $persona->numero_registro ='Web IP: ' ;
        //   $persona->imagen = 'web/formato.pdf';
        //   $persona->save();
        // }
        dd($persona);

      }else{
      $persona = new Persona();
      $persona->estado = 'Activo';
      $persona->nombres = $request->nombres;
      $persona->apellidos = $request->apellidos;
      $persona->numero_documento = $request->cedula;
      $persona->correo = $request->email;
      $persona->user_id = 1;
      $persona->numero_planilla = $request->ip;
      $persona->numero_registro ='Web IP: ' ;
      $persona->imagen = 'web/formato.pdf';
      $persona->save();

        }

        Mail::to($request->email,'IXTUS')
        ->cc('web@minutodedios.tv')
        ->send(new AutorizacionMail($request));
      return back();
    }


}

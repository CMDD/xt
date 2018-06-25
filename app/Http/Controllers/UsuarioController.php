<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UsuarioController extends Controller
{
    public function crear(){
      $usuarios = User::all();
      return view('admin.usuario.crear')->with('usuarios',$usuarios);
    }

    public function verificar(Request $request){
      if (Auth::attempt(['email'=>$request['usuario'], 'password'=>$request['pass']])) {
        // $sub=Auth::User();


        return redirect('ixtus');

      }
      return back();
    }
}

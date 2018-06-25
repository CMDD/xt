<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    public function crear(){
      $usuarios = User::all();
      return view('admin.usuario.crear')->with('usuarios',$usuarios);
    }
}

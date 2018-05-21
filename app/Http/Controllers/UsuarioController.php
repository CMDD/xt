<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function crear(){
      return view('admin.usuario.crear');
    }
}

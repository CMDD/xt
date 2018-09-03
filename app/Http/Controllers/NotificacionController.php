<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacion;

class NotificacionController extends Controller
{
    public function delete(Notificacion $notificacion){
      $notificacion->delete();
      $notis = Notificacion::paginate(10);
       //
       // $snoti = \Session::get('notis');
       \Session::put('noti', Notificacion::count());
      \Session::put('notis', $notis);
      return 'Listo';

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    public function suscripcion(){

      return $this->belongsTo('App\Suscripcion');
    }
}

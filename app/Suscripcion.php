<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $dates = [
      'fecha_inicio',
      'fecha_final'
    ];

    public function persona() {
         return $this->belongsTo('App\Persona');
    }

}

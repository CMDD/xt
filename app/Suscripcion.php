<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $dates = [
      'fecha_inicio',
      'fecha_final',
      'apartir_de',
      'envio_hasta'
    ];

    public function persona() {
         return $this->belongsTo('App\Persona');
    }
    public function usuario() {
         return $this->belongsTo('App\User','user_id');
    }

    public function municipio() {
         return $this->belongsTo('App\Ciudad');
    }
    public function region() {
         return $this->belongsTo('App\Region');
    }



}

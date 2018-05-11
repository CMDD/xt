<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function tipoPersonas(){
      return $this->hasMany(TipoPersona::class);
    }

    public function suscripciones(){
      return $this->hasMany('App\Suscripcion');
    }


}

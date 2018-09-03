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

    public function usuario() {
         return $this->belongsTo('App\User','user_id');
    }
    public function municipio() {
         return $this->belongsTo('App\Ciudad');
    }

    public function donaciones(){
      return $this->hasMany('App\Donacion');
    }
    public function notificacion(){
      return $this->hasMany('App\Notificacion');
    }




}

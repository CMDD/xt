<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    public function departamento() {
         return $this->belongsTo('App\Departamento');
    }
    public function persona() {
         return $this->hasMany('App\Persona');
    }
    public function suscripcion() {
         return $this->hasMany('App\Suscripcion');
    }
}

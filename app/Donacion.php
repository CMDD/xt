<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
  public function persona() {
       return $this->belongsTo('App\Persona');
  }

  public function municipio() {
       return $this->belongsTo('App\Ciudad');
  }

  public function usuario(){
    return $this->belongsTo('App\User','user_id');
  }
}

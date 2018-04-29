<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    public function persona(){
      return $this->belongTo(Persona::class);
    }
}

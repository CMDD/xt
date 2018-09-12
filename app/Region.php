<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
  public function departamento() {
       return $this->hasMany('App\Departamento');
  }
  public function usuario() {
       return $this->hasMany('App\User');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
  public function region() {
       return $this->belongsTo('App\Region');
  }
  public function ciudad() {
       return $this->hasMany('App\Cliudad');
  }


}

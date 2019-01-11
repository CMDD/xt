<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
  public function usuario() {
       return $this->belongsTo('App\User','user_id');
  }
}

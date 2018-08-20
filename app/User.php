<?php

namespace App;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','region_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function persona(){
      return $this->hasMany('App\Persona');
    }
    public function suscripcion(){
      return $this->hasMany('App\Suscripcion');
    }
    public function donacion(){
      return $this->hasMany('App\Donacion');
    }
    public function nota(){
      return $this->hasMany('App\Nota');
    }
    public function region(){
      return $this->belongsTo('App\Region');
    }


}

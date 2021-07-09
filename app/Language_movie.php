<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;

class Language_movie extends Model
{
    
    public function getIdiomaAttribute()
{
    return $this->nombrel . ' ' . $this->descripcionl;
}


    /***  relacion de categoria a muchos movie**/
  public function movie(){

    return $this->belongsTo('moviemega\Movie');
  }


    /***  relacion de categoria a muchos movie**/
  public function language(){

    return $this->belongsTo('moviemega\Language');
  }


 /***  relacion a muchos servers**/
    public function  servers(){
      return $this->hasMany('moviemega\Server');
    }

  /***  relacion a muchos unloading**/
    public function  unloadings(){
      return $this->hasMany('moviemega\Unloading');
    }


}

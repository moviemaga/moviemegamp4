<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;

class Unloading extends Model
{
      /***  relacion de servidor solo tiene una language_movie**/
    public function language_movie(){
    	return $this->belongsTo('moviemega\Language_movie');
    }

}

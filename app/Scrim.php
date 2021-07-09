<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;

class Scrim extends Model
{
    
        /***  relacion de scrim solo tiene una movie**/
    public function movie(){
    	return $this->belongsTo('moviemega\Movie');
    }
}

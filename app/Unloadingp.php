<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;

class Unloadingp extends Model
{
    /***  relacion de servidor solo tiene una language_movie**/
    public function program(){
        return $this->belongsTo('moviemega\Program');
    }
}

<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;

class Comentariop extends Model
{
    /***  relacion de scrim solo tiene una movie**/
    public function program(){
        return $this->belongsTo('moviemega\Program');
    }
}

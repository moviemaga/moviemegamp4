<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    /***  relacion de comentario solo tiene una movie**/
    public function movie(){
        return $this->belongsTo('moviemega\Movie');
    }
}

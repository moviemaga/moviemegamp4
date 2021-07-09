<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    protected $fillable =['nombrel','descripcionl','bandera'];

public function getIdiomaAttribute()
{
    return $this->nombrel . ' ' . $this->descripcionl;
}



    public function getRouteKeyName()
    {
        return 'slugl';
    }



    /**  RELACION DE language to movie**/
     public function movies(){
     	return $this->belongsToMany('moviemega\Movie','language_movies')->withTimestamps();
     }
    /**  FIN**/



 /***  asociamos muchos lenguajes**/
    public function  language_movies(){
      return $this->hasMany('moviemega\Language_movie');
    }

}

<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;

class Movie extends Model
{

    protected $fillable =['nombre','sinopsis', 'calidad', 'fechaestreno','trailer', 'portada', 'estrella','category_id'];
    /**
    *Get the route key for the model.
    *
    *@return string
    */

    /***   busqueda por slug**/
	  public function getRouteKeyName()
    {
       return 'slug';
    }

 /***  relacion de movie solo tiene una categoria**/
    public function category(){
    	return $this->belongsTo('moviemega\Category');
    }

 /***  relacion movie to language**/
    public function languages(){
        return $this->belongsToMany('moviemega\Language','language_movies')->withTimestamps();
    }
/***  relacion de movie a muchos scrim**/
  public function scrims(){

    return $this->hasMany('moviemega\Scrim');
  }

    /***  relacion de movie a muchos scrim**/
    public function comentarios(){

        return $this->hasMany('moviemega\Comentario');
    }

    /***  relacion de movie a muchos scrim**/
    public function publicidads(){

        return $this->hasMany('moviemega\Publicidad');
    }



    /***  asociamos muchos lenguajes**/
    public function  language_movies(){
      return $this->hasMany('moviemega\Language_movie');
    }


}

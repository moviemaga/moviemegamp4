<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable =['nombre','descripcion', 'portada','categoriep_id'];
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
    public function categoriep(){
        return $this->belongsTo('moviemega\Categoriep');
    }
    /***  relacion de movie a muchos scrim**/
    public function scrimps(){

        return $this->hasMany('moviemega\Scrimp');
    }

    /***  relacion de movie a muchos scrim**/
    public function comentariops(){

        return $this->hasMany('moviemega\Comentariop');
    }

    /***  relacion de movie a muchos scrim**/
    public function publicidadps(){

        return $this->hasMany('moviemega\Publicidadp');
    }

    /***  relacion a muchos unloading**/
    public function  unloadingps(){
        return $this->hasMany('moviemega\Unloadingp');
    }
}

<?php

namespace moviemega;

use Illuminate\Database\Eloquent\Model;

class Categoriep extends Model
{
    protected $fillable =['nombrec'];
    /**
     *Get the route key for the model.
     *
     *@return string
     */
    /***   busqueda por slug**/
    public function getRouteKeyName()
    {
        return 'slugc';
    }





    /***  relacion de categoria a muchos movie**/
    public function programs(){

        return $this->hasMany('moviemega\Program');
    }

}

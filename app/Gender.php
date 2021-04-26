<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    /***  relacion de generos a muchos cliente**/
    public function genders(){

        return $this->hasMany('App\Customer');
    }
}

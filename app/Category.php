<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /***  relacion de categoria a muchos cliente**/
    public function categories(){

        return $this->hasMany('App\Customer');
    }
}

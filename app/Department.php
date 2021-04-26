<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /***  relacion de departamentos a muchos cliente**/
    public function departments(){

        return $this->hasMany('App\Customer');
    }
}

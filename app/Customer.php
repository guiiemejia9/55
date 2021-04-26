<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;

class Customer extends Model
{
    /***  relacion de cliente solo tiene una categoria**/
    public function category(){
        return $this->belongsTo('App\Category');
    }
    /***  relacion de cliente solo tiene un genero**/
    public function gender(){
        return $this->belongsTo('App\Gender');
    }
    /***  relacion de cliente solo tiene un departamento**/
    public function department(){
        return $this->belongsTo('App\Department');
    }

}

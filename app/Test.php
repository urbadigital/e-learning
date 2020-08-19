<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function preguntas(){

    	return $this->hasMany('App\Preguntas');
    }
}

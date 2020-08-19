<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    public function curso(){

    	return $this->hasMany('App\Curso');
    }
}

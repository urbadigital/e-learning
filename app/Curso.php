<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Curso extends Model
{
    public function tema(){

        return $this->belongsTo('App\Tema');
    }

    public function contenido(){

    	return $this->hasMany('App\Contenidos');
    }

    public function archivos(){

    	return $this->hasMany('App\ArchivoCurso');
    }

    public function videos(){

    	return $this->hasMany('App\VideoCurso');
    }
}

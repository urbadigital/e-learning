<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcontenido extends Model
{
    public function contenido(){

        return $this->belongsTo('App\Contenido');
    }

    public function videos(){

    	return $this->hasMany('App\VideoSubcontenido');
    }

    public function archivos(){

    	return $this->hasMany('App\ArchivoSubcontenido');
    }
}

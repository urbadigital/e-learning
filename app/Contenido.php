<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{

    public static function contenido($id){
       return Contenido::Where('curso_id','=',$id)
        ->get();

    } 

    public function subcontenido(){

    	return $this->hasMany('App\Subcontenido');
    }

    public function curso(){

        return $this->belongsTo('App\Curso');
    }

   public function videos(){

    	return $this->hasMany('App\VideoContenido');
    }

    public function archivos(){

    	return $this->hasMany('App\ArchivoContenido');
    }
}

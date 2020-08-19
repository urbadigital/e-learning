<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
	public static function preguntas(){
       return Preguntas::join('tests','tests.id', '=','preguntas.tests_id')
                                    ->select('preguntas.*','tests.nombre_test')
                                    ->with('respuesta')
                                    ->get();

    }

    public static function preguntasActivasTest($idTest){
       return Preguntas::join('tests','tests.id', '=','preguntas.tests_id')
                                    ->where('preguntas.tests_id','=',$idTest)
                                    ->where('preguntas.estado_pregunta','=',TRUE)
                                    ->select('preguntas.*','tests.nombre_test')
                                    ->with('respuesta')
                                    ->get();

    }

    public static function preguntasInactivasTest($idTest){
       return Preguntas::join('tests','tests.id', '=','preguntas.tests_id')
                                    ->where('preguntas.tests_id','=',$idTest)
                                    ->where('preguntas.estado_pregunta','=',FALSE)
                                    ->select('preguntas.*','tests.nombre_test')
                                    ->with('respuesta')
                                    ->get();

    } 

    public function archivoPregunta(){

        return $this->hasMany('App\ArchivoPregunta');
    }

    public function videoPregunta(){

        return $this->hasMany('App\VideoPregunta');
    }

    public function respuesta(){

    	return $this->hasMany('App\Respuesta');
    }

    public function test()
    {
        return $this->belongsTo('App\Test');
    }
}

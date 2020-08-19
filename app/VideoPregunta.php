<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoPregunta extends Model
{
    public function preguntas(){

        return $this->belongsTo('App\Preguntas');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoContenido extends Model
{
    public function contenido(){

        return $this->belongsTo('App\Contenido');
    }
}

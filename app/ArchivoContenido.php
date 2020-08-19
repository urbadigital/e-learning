<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoContenido extends Model
{
    public function contenido(){

        return $this->belongsTo('App\Contenido');
    }
}

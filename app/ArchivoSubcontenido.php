<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoSubcontenido extends Model
{
    public function subcontenido(){

        return $this->belongsTo('App\Subcontenido');
    }
}

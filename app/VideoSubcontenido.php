<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoSubcontenido extends Model
{
    public function subcontenido(){

        return $this->belongsTo('App\Subcontenido');
    }
}

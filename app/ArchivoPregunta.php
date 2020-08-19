<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoPregunta extends Model
{
    public function preguntas(){

        return $this->belongsTo('App\Preguntas');
    }
}

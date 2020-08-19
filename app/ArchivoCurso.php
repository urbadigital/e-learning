<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoCurso extends Model
{
    public function curso(){

        return $this->belongsTo('App\Curso');
    }
}

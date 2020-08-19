<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesClaseController extends Controller
{
    //

    public function home()
    {

        
        //return view('curso.detalleCurso')->with(["cursoSeleccionado"=>$cursoSeleccionado]);
    
        return view('page-clase.home-clase');

      
    }

    public function vistaEntrenamiento()
    {

        
        //return view('curso.detalleCurso')->with(["cursoSeleccionado"=>$cursoSeleccionado]);
    
        return view('page-clase.entrenamiento-clase');

      
    }
}

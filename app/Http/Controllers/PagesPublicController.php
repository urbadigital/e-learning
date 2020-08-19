<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tema;
use App\Curso;
use App\VideoCurso;
use App\ArchivoCurso;
use Storage;
use File;
use DB;

class PagesPublicController extends Controller
{
    //

    public function home()
    {

        $temasHauser=Tema::where('estado_tema', true)
        					->get();

        $cursosHauser =DB::Table('cursos')
                    ->join('temas','temas.id', '=','cursos.tema_id')
                    ->select('cursos.*','temas.nombre_tema')
                    ->get();

        //dd($temasHauser);
                    //return view('page-public.home');
        //return view('curso.detalleCurso')->with(["cursoSeleccionado"=>$cursoSeleccionado]);
    
        return view('page-public.home')->with(["temasHauser"=>$temasHauser, 
        										"cursosHauser"=>$cursosHauser
    											]);

      
    }

    public function muestraCursos()
    {

        $cursosHauser =DB::Table('cursos')
                    ->join('temas','temas.id', '=','cursos.tema_id')
                    ->select('cursos.*','temas.nombre_tema')
                    ->get();

        return view('page-public.cursos')->with(["cursosHauser"=>$cursosHauser]);
    }

    public function contactanos()
    {

        return view('page-public.contactanos');
    }

}

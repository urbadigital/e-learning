<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Test;
use App\Contenido;
use App\Curso;
use App\Preguntas;
use Laracasts\Flash\Flash;
use DB;

class TestHauserController extends Controller
{
    public function simulacionTest($idTest)
    {
        $preguntasHauser = Preguntas::preguntasActivasTest($idTest);
        $testHauser = Test::find($idTest);
       //dd($preguntasHauser,$testHauser);
           return view('tests.visualizarTest')->with(['testHauser'=>$testHauser,
                                                        'preguntasHauser'=>$preguntasHauser
                                                    ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $testHauser=Test::all();
           //dd('HOmne',$testHauser);
           return view('tests.homeTest')->with(['testHauser'=>$testHauser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursosHauser=Curso::all();
            //dd($cursosHauser);
         return view('tests.addTest')->with(['cursosHauser'=>$cursosHauser]);
    }

   public function obtenerContenido(Request $request, $id){

        return Contenido::contenido($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_test = $request['nombre_test'];
        $contenido_id = $request['contenido_id'];
        $estado_test = $request['estado_test'];
        $descripcion_test = $request['descripcion_test'];
       
        $Test = new Test;
        $Test-> nombre_test = $nombre_test;
        $Test-> estado_test = $estado_test;
        $Test-> descripcion_test = $descripcion_test;
        $Test-> contenido_id = $contenido_id;
        $Test-> save();

        Flash::success("Su registro de test fue exitoso");

        return redirect('/hauser/home-test');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testSeleccionado=Test::find($id);
        
        $contenido=Contenido::find($testSeleccionado->contenido_id);
        $contenidosCursoHauser=DB::table('contenidos')
                                    ->where('curso_id', $contenido->curso_id)
                                    ->select('contenidos.*')
                                    ->get();


        return view('tests.editTest')->with(['testSeleccionado'=>$testSeleccionado,
                                              'contenidosCursoHauser'=>$contenidosCursoHauser,      
                                            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nombre_test = $request['nombre_test'];
        $contenido_id = $request['contenido_id'];
        $estado_test = $request['estado_test'];
        $descripcion_test = $request['descripcion_test'];
       
        $Test = Test::find($id);
        $Test-> nombre_test = $nombre_test;
        $Test-> estado_test = $estado_test;
        $Test-> descripcion_test = $descripcion_test;
        $Test-> contenido_id = $contenido_id;
        $Test-> save();

        Flash::info("La actualizacion del test fue exitoso");

        return redirect('/hauser/home-test');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

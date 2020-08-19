<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tema;

class TemaHauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $temasHauser=Tema::all(); 
        return view('tema.home-Tema')->with(["temasHauser"=>$temasHauser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tema.add_Tema');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tema = $request['tema'];
        $estado_tema = $request['estado_tema'];
        $descripcion_tema = $request['descripcion_tema'];
        //dd($tema,$estado_tema,$descripcion_tema);
        //dd($tema);
        $Tema = new Tema;
        $Tema-> nombre_tema = $tema;
        $Tema-> descripcion_tema = $descripcion_tema;
        $Tema-> estado_tema = $estado_tema;
        $Tema-> save();
        return redirect('/tema/home-tema-hauser');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temaSeleccionado=Tema::find($id);
         return view('tema.detalleTema')->with(["temaSeleccionado"=>$temaSeleccionado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $temaSeleccionado=Tema::find($id);
        //dd($temaSeleccionado); 
       return view('tema.editar_Tema')->with(["temaSeleccionado"=>$temaSeleccionado]);
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
        $tema = $request['tema'];
        $estado_tema = $request['estado_tema'];
        $descripcion_tema = $request['descripcion_tema'];

        $TemaModificado = Tema::find($id);
        $TemaModificado-> nombre_tema = $tema;
        $TemaModificado-> descripcion_tema = $descripcion_tema;
        $TemaModificado-> estado_tema = $estado_tema;
        $TemaModificado-> save();
        return redirect('/tema/home-tema-hauser');
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

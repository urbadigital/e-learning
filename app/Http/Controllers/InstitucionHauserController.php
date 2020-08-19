<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Institucion;
use Illuminate\Http\Request;

class InstitucionHauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institucionesHauser = Institucion::all();
        //dd('HOmne',$institucionesHauser);
        return view('admin.institucion.home-instituciones')->with(['institucionesHauser' => $institucionesHauser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.institucion.add_institucion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_institucion      = $request['nombre_institucion'];
        $descripcion_institucion = $request['descripcion_institucion'];
        $estado_institucion      = $request['estado_institucion'];

        $Institucion                          = new Institucion;
        $Institucion->nombre_institucion      = $nombre_institucion;
        $Institucion->descripcion_institucion = $descripcion_institucion;
        $Institucion->estado_institucion      = $estado_institucion;
        $Institucion->save();

        return redirect('/hauser/home-instituciones');
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

        $institucionSeleccionada = Institucion::find($id);

        return view('admin.institucion.editar_institucion')->with(['institucionSeleccionada' => $institucionSeleccionada]);

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
        $nombre_institucion      = $request['nombre_institucion'];
        $descripcion_institucion = $request['descripcion_institucion'];
        $estado_institucion      = $request['estado_institucion'];

        $Institucion                          = Institucion::find($id);
        $Institucion->nombre_institucion      = $nombre_institucion;
        $Institucion->descripcion_institucion = $descripcion_institucion;
        $Institucion->estado_institucion      = $estado_institucion;
        $Institucion->save();

        return redirect('/hauser/home-instituciones');
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

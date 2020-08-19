<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contenido; 
use App\Curso; 
use App\VideoContenido;
use App\ArchivoContenido;
use Storage;
use File;
use DB;

class ContenidoHauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        //$ContenidosCurso = DB::table('contenidos')->where('curso_id', $id)->get();
        //$CursoSeleccionado = DB::table('cursos')->where('id', $id)->first();
        $contenidosHauser =DB::Table('contenidos')
                    ->join('cursos','cursos.id', '=','contenidos.curso_id')
                    ->join('temas','temas.id', '=','cursos.tema_id')
                    ->select('contenidos.*','temas.nombre_tema','cursos.nombre_curso')
                    ->get();
        //dd($contenidosHauser);
        return view('contenido.home-Contenidos')->with(["contenidosHauser"=>$contenidosHauser]);


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function create()
    {
        $cursoHauser = Curso::all();
        //dd($cursoHauser);
        return view('contenido.createContenido')->with(["cursoHauser"=>$cursoHauser]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $nombre_contenido=$request['contenido'];
        $descripcion_contenido=$request['descripcion_contenido'];
        $estado_contenido=$request['estado_contenido'];
        $curso_id=$request['curso_id'];
        

        $Contenido = new Contenido;
        $Contenido-> nombre_contenido = $nombre_contenido;
        $Contenido-> descripcion_contenido = $descripcion_contenido;
        $Contenido-> estado_contenido = $estado_contenido;
        $Contenido-> curso_id = $curso_id;
        $Contenido-> save();

                $items1 = ($request['nombre_video_contenido']);
                $items2 = ($request['descripcion_video_contenido']);
                $items3 = ($request['url_video_contenido']);

                $archivoitems1 = ($request['nombre_archivo_contenido']);
                $archivoitems2 = ($request['descripcion_archivo_contenido']);

                /*VIDEOS*/
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    $item3 = current($items3);
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $nombre_video_contenido=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $descripcion_video_contenido=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $url_video_contenido=(( $item3 !== false) ? $item3 : ", &nbsp;");
                   

                    //dd($nombre_video_curso,$descripcion_video_curso,$url_video_curso);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $VideoContenido = new VideoContenido;
                    $VideoContenido-> nombre_video_contenido = $nombre_video_contenido;
                    $VideoContenido-> descripcion_video_contenido = $descripcion_video_contenido;
                    $VideoContenido-> url_video_contenido = $url_video_contenido;
                    $VideoContenido-> contenido_id = $Contenido->id;
                    $VideoContenido-> save();

                    
                    // Up! Next Value
                    $item1 = next( $items1 );
                    $item2 = next( $items2 );
                    $item3 = next( $items3 );
                    
                    
                    // Check terminator
                    if($item1 === false && $item2 === false && $item3 === false) break;
    
                }


                  /*ARCHIVOS*/
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $archivoitem1 = current($archivoitems1);
                    $descripcionitem2 = current($archivoitems2);
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $nombre_archivo_contenido=(( $archivoitem1 !== false) ? $archivoitem1 : ", &nbsp;");
                    $descripcion_archivo_contenido=(( $descripcionitem2 !== false) ? $descripcionitem2 : ", &nbsp;");

                    $nombreArchivo = strtotime("now").'-'.$nombre_archivo_contenido->getClientOriginalName();

                    Storage::disk('contenido')->put($nombreArchivo,file_get_contents($nombre_archivo_contenido->getRealPath()));
                    

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $ArchivoContenido = new ArchivoContenido;
                    $ArchivoContenido-> nombre_archivo_contenido = $nombreArchivo;
                    $ArchivoContenido-> descripcion_archivo_contenido = $descripcion_archivo_contenido;
                    $ArchivoContenido-> contenido_id = $Contenido->id;
                    $ArchivoContenido-> save();

                    
                    // Up! Next Value
                    $archivoitem1 = next( $archivoitems1 );
                    $descripcionitem2 = next( $archivoitems2 );
                    
                    
                    
                    // Check terminator
                    if($archivoitem1 === false && $descripcionitem2 === false ) break;
    
                }            

        return redirect('/contenido/home-contenido-curso-hauser');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contenidoSeleccionado= Contenido::find($id);

        //dd($contenidoSeleccionado);
        return view('contenido.detalleContenido')->with(["contenidoSeleccionado"=>$contenidoSeleccionado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function edit($idContenido)
    {
        $contenidoActualizar= Contenido::find($idContenido);
        $cursoHauser = Curso::all();
        $archivosContenido = ArchivoContenido::where('contenido_id','=',$idContenido)->get();
        $videosContenido = VideoContenido::where('contenido_id','=',$idContenido)->get();
        //dd($archivosContenido,$videosContenido);
        return view('contenido.updateContenido')->with(["idContenido"=>$idContenido,
                                                        "contenidoActualizar"=>$contenidoActualizar,
                                                        "archivosContenido"=>$archivosContenido,
                                                        "videosContenido"=>$videosContenido,
                                                        "cursoHauser"=>$cursoHauser
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

        $nombre_contenido=$request['contenido'];
        $descripcion_contenido=$request['descripcion_contenido'];
        $estado_contenido=$request['estado_contenido'];
        $curso_id=$request['curso_id'];
         
         if(!is_null($request['id_video'])){

                $items1 = ($request['nombre_video_contenido']);
                $items2 = ($request['descripcion_video_contenido']);
                $items3 = ($request['url_video_contenido']);
                $items4 = ($request['id_video']);
                //dd($items4,$items3);
         /*VIDEOS*/
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    $item3 = current($items3);
                    $item4 = current($items4);
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $nombre_video_contenido=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $descripcion_video_contenido=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $url_video_contenido=(( $item3 !== false) ? $item3 : ", &nbsp;");
                    $id_video=(( $item4 !== false) ? $item4 : ", &nbsp;");
                   

                    //dd($nombre_video_curso,$descripcion_video_curso,$url_video_curso);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $VideoCurso = VideoContenido::find($id_video);
                    $VideoCurso-> nombre_video_contenido = $nombre_video_contenido;
                    $VideoCurso-> descripcion_video_contenido = $descripcion_video_contenido;
                    $VideoCurso-> url_video_contenido = $url_video_contenido;
                    $VideoCurso-> save();
                    
                    // Up! Next Value
                    $item1 = next( $items1 );
                    $item2 = next( $items2 );
                    $item3 = next( $items3 );
                    $item4 = next( $items4 );
                    
                    
                    // Check terminator
                    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
    
                }
                }
                 if(!is_null($request['id_archivo'])){
                  
                $archivositems1 = ($request['id_archivo']);
                $archivositems2 = ($request['descripcion_archivo_cocntenido']);
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $idItem1 = current($archivositems1);
                    $descripcionItem2 = current($archivositems2);
                    
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id_archivo=(( $idItem1 !== false) ? $idItem1 : ", &nbsp;");
                    $descripcion_archivo_contenido=(( $descripcionItem2 !== false) ? $descripcionItem2 : ", &nbsp;");

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $ArchivoContenido = ArchivoContenido::find($id_archivo);
                    $ArchivoContenido-> descripcion_archivo_contenido = $descripcion_archivo_contenido;
                    $ArchivoContenido-> save();
                    
                    // Up! Next Value
                    $idItem1 = next( $archivositems1 );
                    $descripcionItem2 = next( $archivositems2 );
                    
                    
                    
                    // Check terminator
                    if($idItem1 === false && $descripcionItem2 === false) break;
    
                }
                }

                //dd('Se actualizar');
        $ContenidoUpdate = Contenido::find($id);
        $ContenidoUpdate-> nombre_contenido = $nombre_contenido;
        $ContenidoUpdate-> descripcion_contenido = $descripcion_contenido;
        $ContenidoUpdate-> estado_contenido = $estado_contenido;
        $ContenidoUpdate-> curso_id = $curso_id;
        $ContenidoUpdate-> save();

        return redirect('/contenido/home-contenido-curso-hauser');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcontenido;
use App\Contenido;
use App\ArchivoSubcontenido;
use App\VideoSubcontenido;
use Storage;
use File;
use DB;
class SubcontenidoHauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SubcontenidosHauser =DB::Table('subcontenidos')
                                ->join('contenidos','contenidos.id', '=','subcontenidos.contenido_id')
                                ->join('cursos','cursos.id', '=','contenidos.curso_id')
                                ->join('temas','temas.id', '=','cursos.tema_id')
                                ->select('subcontenidos.*','temas.nombre_tema','cursos.nombre_curso','contenidos.nombre_contenido')
                                ->get();
        //dd($SubcontenidosHauser);
        
        //dd($ContenidoSeleccionado);
        return view('subcontenido.home-Subcontenido')->with(["SubcontenidosHauser"=>$SubcontenidosHauser]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $contenidoHauser = Contenido::all();
        //dd($contenidoHauser);
        
        return view('subcontenido.createSubcontenido')->with(["contenidoHauser"=>$contenidoHauser]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_subcontenido=$request['nombre_subcontenido'];
        $descripcion_subcontenido=$request['descripcion_subcontenido'];
       
        $estado_subcontenido=$request['estado_subcontenido'];
        $contenido_id=$request['contenido_id'];
        

        $Subcontenido = new Subcontenido;
        $Subcontenido-> nombre_subcontenido = $nombre_subcontenido;
        $Subcontenido-> descripcion_subcontenido = $descripcion_subcontenido;
        $Subcontenido-> estado_subcontenido = $estado_subcontenido;
        $Subcontenido-> contenido_id = $contenido_id;
        $Subcontenido-> save();

                $items1 = ($request['nombre_video_subcontenido']);
                $items2 = ($request['descripcion_video_subcontenido']);
                $items3 = ($request['url_video_subcontenido']);

                $archivoitems1 = ($request['nombre_archivo_subcontenido']);
                $archivoitems2 = ($request['descripcion_archivo_subcontenido']);

                 /*VIDEOS*/
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    $item3 = current($items3);
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $nombre_video_subcontenido=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $descripcion_video_subcontenido=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $url_video_subcontenido=(( $item3 !== false) ? $item3 : ", &nbsp;");
                   

                    //dd($nombre_video_curso,$descripcion_video_curso,$url_video_curso);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $VideoSubcontenido = new VideoSubcontenido;
                    $VideoSubcontenido-> nombre_video_subcontenido = $nombre_video_subcontenido;
                    $VideoSubcontenido-> descripcion_video_subcontenido = $descripcion_video_subcontenido;
                    $VideoSubcontenido-> url_video_subcontenido = $url_video_subcontenido;
                    $VideoSubcontenido-> subcontenido_id = $Subcontenido->id;
                    $VideoSubcontenido-> save();

                    
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
                    $nombre_archivo_subcontenido=(( $archivoitem1 !== false) ? $archivoitem1 : ", &nbsp;");
                    $descripcion_archivo_subcontenido=(( $descripcionitem2 !== false) ? $descripcionitem2 : ", &nbsp;");

                    $nombreArchivo = strtotime("now").'-'.$nombre_archivo_subcontenido->getClientOriginalName();

                    Storage::disk('subcontenido')->put($nombreArchivo,file_get_contents($nombre_archivo_subcontenido->getRealPath()));
                   

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $ArchivoSubcontenido = new ArchivoSubcontenido;
                    $ArchivoSubcontenido-> nombre_archivo_subcontenido = $nombreArchivo;
                    $ArchivoSubcontenido-> descripcion_archivo_subcontenido = $descripcion_archivo_subcontenido;
                    $ArchivoSubcontenido-> subcontenido_id = $Subcontenido->id;
                    $ArchivoSubcontenido-> save();

                    
                    // Up! Next Value
                    $archivoitem1 = next( $archivoitems1 );
                    $descripcionitem2 = next( $archivoitems2 );
                    
                    
                    
                    // Check terminator
                    if($archivoitem1 === false && $descripcionitem2 === false ) break;
    
                }

        return redirect('/subcontenido/home-subcontenido-contenido-curso-hauser');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idSubcontenido)
    {   
        $subcontenidoSeleccionado=Subcontenido::find($idSubcontenido);
        //dd($subcontenidoSeleccionado);
        return view('subcontenido.detalleSubcontenido')->with(["subcontenidoSeleccionado"=>$subcontenidoSeleccionado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($idSubcontenido)
    {
      
        $contenidoHauser = Contenido::all();   
        $subcontenidoSeleccionado=Subcontenido::find($idSubcontenido);
        $archivosSubcontenido = ArchivoSubcontenido::where('subcontenido_id','=',$idSubcontenido)->get();
        $videosSubcontenido = VideoSubcontenido::where('subcontenido_id','=',$idSubcontenido)->get();
        //dd($archivosSubcontenido,$videosSubcontenido);
        
        return view('subcontenido.updateSubcontenido')->with(["idSubcontenido"=>$idSubcontenido,
                                                            "subcontenidoSeleccionado"=>$subcontenidoSeleccionado,
                                                            "archivosSubcontenido"=>$archivosSubcontenido,
                                                            "contenidoHauser"=>$contenidoHauser,
                                                            "videosSubcontenido"=>$videosSubcontenido
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
        $nombre_subcontenido=$request['nombre_subcontenido'];
        $descripcion_subcontenido=$request['descripcion_subcontenido'];
        $estado_subcontenido=$request['estado_subcontenido'];
        $contenido_id=$request['contenido_id'];
        
        if(!is_null($request['id_video'])){

                $items1 = ($request['nombre_video_subcontenido']);
                $items2 = ($request['descripcion_video_subcontenido']);
                $items3 = ($request['url_video_subcontenido']);
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
                    $nombre_video_subcontenido=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $descripcion_video_subcontenido=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $url_video_subcontenido=(( $item3 !== false) ? $item3 : ", &nbsp;");
                    $id_video=(( $item4 !== false) ? $item4 : ", &nbsp;");
                   

                    //dd($nombre_video_curso,$descripcion_video_curso,$url_video_curso);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $VideoSubcontenido = VideoSubcontenido::find($id_video);
                    $VideoSubcontenido-> nombre_video_subcontenido = $nombre_video_subcontenido;
                    $VideoSubcontenido-> descripcion_video_subcontenido = $descripcion_video_subcontenido;
                    $VideoSubcontenido-> url_video_subcontenido = $url_video_subcontenido;
                    $VideoSubcontenido-> save();
                    
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
                $archivositems2 = ($request['descripcion_archivo_subcontenido']);
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $idItem1 = current($archivositems1);
                    $descripcionItem2 = current($archivositems2);
                    
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id_archivo=(( $idItem1 !== false) ? $idItem1 : ", &nbsp;");
                    $descripcion_archivo_subcontenido=(( $descripcionItem2 !== false) ? $descripcionItem2 : ", &nbsp;");

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $ArchivoSubcontenido = ArchivoSubcontenido::find($id_archivo);
                    $ArchivoSubcontenido-> descripcion_archivo_subcontenido = $descripcion_archivo_subcontenido;
                    $ArchivoSubcontenido-> save();
                    
                    // Up! Next Value
                    $idItem1 = next( $archivositems1 );
                    $descripcionItem2 = next( $archivositems2 );
                    
                    
                    
                    // Check terminator
                    if($idItem1 === false && $descripcionItem2 === false) break;
    
                }
                }
               //dd('Actualizado');
        $SubcontenidoUpdate = Subcontenido::find($id);
        $SubcontenidoUpdate-> nombre_subcontenido = $nombre_subcontenido;
        $SubcontenidoUpdate-> descripcion_subcontenido = $descripcion_subcontenido;
        $SubcontenidoUpdate-> estado_subcontenido = $estado_subcontenido;
        $SubcontenidoUpdate-> contenido_id = $contenido_id;
        $SubcontenidoUpdate-> save();


        return redirect('/subcontenido/home-subcontenido-contenido-curso-hauser');
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

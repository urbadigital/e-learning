<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Preguntas;
use App\Respuesta;
use App\ArchivoPregunta;
use App\VideoPregunta;
use Storage;
use File;
use DB;
use Laracasts\Flash\Flash;
class PreguntasTestHauserController extends Controller
{
    

    public function indexPreguntasActivasTest($idTest)
    {
      
        $preguntasHauser = Preguntas::preguntasActivasTest($idTest);
        $testHauser = Test::find($idTest);
       
        return view('preguntas.preguntasActivasTest')->with(['preguntasHauser'=>$preguntasHauser,
                                                        'testHauser'=>$testHauser
                                                    ]);
    }

    public function indexPreguntasInactivasTest($idTest)
    {
      
        $preguntasHauser = Preguntas::preguntasInactivasTest($idTest);
        $testHauser = Test::find($idTest);
       //dd($preguntasHauser,$testHauser);
        return view('preguntas.preguntasInactivasTest')->with(['preguntasHauser'=>$preguntasHauser,
                                                        'testHauser'=>$testHauser
                                                    ]);
    }

    public function createPreguntaTest($idTest)
    {
            $testHauser=Test::find($idTest);

           return view('preguntas.crearPreguntasTest')->with(['testHauser'=>$testHauser]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$preguntasHauser=Preguntas::all();
       /* $preguntasHauser = Preguntas::with('respuesta')
                                    ->get();*/

        $preguntasHauser = Preguntas::preguntas();
       //dd($preguntasHauser);
        return view('preguntas.homePreguntasTest')->with(['preguntasHauser'=>$preguntasHauser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $testHauser=Test::all();

           return view('preguntas.createPreguntasTest')->with(['testHauser'=>$testHauser]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Pregunta con respuesta unica*/
        $descripcion_pregunta = $request['descripcion_pregunta'];
        $solucion_respuesta_unica = $request['solucion_pregunta'];
        $solucion_respuesta_multiple = $request['solucion_respuesta_multiple'];
        $tipo_pregunta = $request['tipo_pregunta'];
        $estado_pregunta = $request['estado_pregunta'];
        $test_id = $request['test_id'];
        //dd($estado_pregunta);
        //REQUEST VIDEOS PREGUNTAS
        $items1 = ($request['nombre_video_pregunta']);
        $items2 = ($request['descripcion_video_pregunta']);
        $items3 = ($request['url_video_pregunta']);

        //REQUEST ARCHIVOS PREGUNTAS
        $archivoitems1 = ($request['nombre_archivo_pregunta']);
        $archivoitems2 = ($request['descripcion_archivo_pregunta']);
        //dd($items1);

        $Preguntas = new Preguntas;
        $Preguntas-> descripcion_pregunta = $descripcion_pregunta;
        $Preguntas-> tipo_pregunta = $tipo_pregunta;
        $Preguntas-> estado_pregunta = $estado_pregunta;
        $Preguntas-> tests_id = $test_id;

        //dd($items1[0],$items2,$archivoitems1);


        //dd($descripcion_pregunta, $solucion_pregunta, $tipo_pregunta, $test_id);
       

        if ($tipo_pregunta==2) {

           

            
            //RESPUESTA UNICA
            $Preguntas-> solucion_pregunta = $solucion_respuesta_unica;
            //dd($Preguntas);
            $Preguntas-> save();


            $respuestaCorrecta = $request['respuestaUnicaVerdadera'];
            
            $respuestaUnica1 = $request['respuestaUnica1'];
            
            $Respuesta1 = new Respuesta;
            $Respuesta1-> descripcion_respuesta = $respuestaUnica1;
            if ($respuestaUnica1==$respuestaCorrecta) {
                $Respuesta1-> valor_respuesta = TRUE;
            }else{
                $Respuesta1-> valor_respuesta = FALSE;    
            }
            $Respuesta1-> preguntas_id = $Preguntas->id;
            $Respuesta1-> save();
             
            
            
            $respuestaUnica2 = $request['respuestaUnica2'];
            $Respuesta2 = new Respuesta;
            $Respuesta2-> descripcion_respuesta = $respuestaUnica2;
            if ($respuestaUnica2==$respuestaCorrecta) {
                $Respuesta2-> valor_respuesta = TRUE;
            }else{
                $Respuesta2-> valor_respuesta = FALSE;    
            }
            $Respuesta2-> preguntas_id = $Preguntas->id;
            $Respuesta2-> save();
            
            
            $respuestaUnica3 = $request['respuestaUnica3'];
            $Respuesta3 = new Respuesta;
            $Respuesta3-> descripcion_respuesta = $respuestaUnica3;
            if ($respuestaUnica3==$respuestaCorrecta) {
                $Respuesta3-> valor_respuesta = TRUE;
            }else{
                $Respuesta3-> valor_respuesta = FALSE;    
            }
            $Respuesta3-> preguntas_id = $Preguntas->id;
            $Respuesta3-> save();
            

            $respuestaUnica4 = $request['respuestaUnica4'];
            $Respuesta4 = new Respuesta;
            $Respuesta4-> descripcion_respuesta = $respuestaUnica4;
            if ($respuestaUnica4==$respuestaCorrecta) {
                $Respuesta4-> valor_respuesta = TRUE;
            }else{
                $Respuesta4-> valor_respuesta = FALSE;    
            }
            $Respuesta4-> preguntas_id = $Preguntas->id;
            $Respuesta4-> save();
             

            $respuestaUnica5 = $request['respuestaUnica5'];
            $Respuesta5 = new Respuesta;
            $Respuesta5-> descripcion_respuesta = $respuestaUnica5;
            if ($respuestaUnica5==$respuestaCorrecta) {
                $Respuesta5-> valor_respuesta = TRUE;
            }else{
                $Respuesta5-> valor_respuesta = FALSE;    
            }
            $Respuesta5-> preguntas_id = $Preguntas->id;
            $Respuesta5-> save();

            Flash::success("El registro de la pregunta ha sido exitosa");
             
        }else{

            $Preguntas-> solucion_pregunta = $solucion_respuesta_multiple;
            //dd($Preguntas);
            $Preguntas-> save();

            $respuesta_multiple1 = $request['respuesta_multiple1'];
            $validacion_repuesta1 = $request['validacion_repuesta1'];
            $Respuesta1 = new Respuesta;
            $Respuesta1-> descripcion_respuesta = $respuesta_multiple1;
            if (is_null($validacion_repuesta1)) {
                $Respuesta1-> valor_respuesta = FALSE; 
            }else{
                $Respuesta1-> valor_respuesta = TRUE;
            }
            $Respuesta1-> preguntas_id = $Preguntas->id;
            $Respuesta1-> save();

            $respuesta_multiple2 = $request['respuesta_multiple2'];
            $validacion_repuesta2 = $request['validacion_repuesta2'];
            $Respuesta2 = new Respuesta;
            $Respuesta2-> descripcion_respuesta = $respuesta_multiple2;
            if (is_null($validacion_repuesta2)) {
                $Respuesta2-> valor_respuesta = FALSE; 
            }else{
                $Respuesta2-> valor_respuesta = TRUE;
            }
            $Respuesta2-> preguntas_id = $Preguntas->id;
            $Respuesta2-> save();

            $respuesta_multiple3 = $request['respuesta_multiple3'];
            $validacion_repuesta3 = $request['validacion_repuesta3'];
            $Respuesta3 = new Respuesta;
            $Respuesta3-> descripcion_respuesta = $respuesta_multiple3;
            if (is_null($validacion_repuesta3)) {
                $Respuesta3-> valor_respuesta = FALSE; 
            }else{
                $Respuesta3-> valor_respuesta = TRUE;
            }
            $Respuesta3-> preguntas_id = $Preguntas->id;
            $Respuesta3-> save();


            $respuesta_multiple4 = $request['respuesta_multiple4'];
            $validacion_repuesta4 = $request['validacion_repuesta4'];
            $Respuesta4 = new Respuesta;
            $Respuesta4-> descripcion_respuesta = $respuesta_multiple4;
            if (is_null($validacion_repuesta4)) {
                $Respuesta4-> valor_respuesta = FALSE; 
            }else{
                $Respuesta4-> valor_respuesta = TRUE;
            }
            $Respuesta4-> preguntas_id = $Preguntas->id;
            $Respuesta4-> save();

            $respuesta_multiple5 = $request['respuesta_multiple5'];
            $validacion_repuesta5 = $request['validacion_repuesta5'];
            $Respuesta5 = new Respuesta;
            $Respuesta5-> descripcion_respuesta = $respuesta_multiple5;
            if (is_null($validacion_repuesta5)) {
                $Respuesta5-> valor_respuesta = FALSE; 
            }else{
                $Respuesta5-> valor_respuesta = TRUE;
            }
            $Respuesta5-> preguntas_id = $Preguntas->id;
            $Respuesta5-> save();


            Flash::success("El registro de la pregunta ha sido exitosa");
        }
        //REGISTRO DE ARCHIVOS Y VIDEOS PREGUNTA

        if (!is_null($items1[0])) {
            
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    $item3 = current($items3);
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $nombre_video_pregunta=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $descripcion_video_pregunta=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $url_video_pregunta=(( $item3 !== false) ? $item3 : ", &nbsp;");
                   

                    //dd($nombre_video_curso,$descripcion_video_curso,$url_video_curso);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $VideoPregunta = new VideoPregunta;
                    $VideoPregunta-> nombre_video_pregunta = $nombre_video_pregunta;
                    $VideoPregunta-> descripcion_video_pregunta = $descripcion_video_pregunta;
                    $VideoPregunta-> url_video_pregunta = $url_video_pregunta;
                    $VideoPregunta-> preguntas_id = $Preguntas->id;
                    $VideoPregunta-> save();

                    
                    // Up! Next Value
                    $item1 = next( $items1 );
                    $item2 = next( $items2 );
                    $item3 = next( $items3 );
                    
                    
                    // Check terminator
                    if($item1 === false && $item2 === false && $item3 === false) break;
    
                }
            }

            
            if (!is_null($archivoitems1)) {
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $archivoitem1 = current($archivoitems1);
                    $descripcionitem2 = current($archivoitems2);
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $nombre_archivo_pregunta=(( $archivoitem1 !== false) ? $archivoitem1 : ", &nbsp;");
                    $descripcion_archivo_pregunta=(( $descripcionitem2 !== false) ? $descripcionitem2 : ", &nbsp;");

                    $nombreArchivo = strtotime("now").'-'.$nombre_archivo_pregunta->getClientOriginalName();

                    Storage::disk('preguntas')->put($nombreArchivo,file_get_contents($nombre_archivo_pregunta->getRealPath()));
                    

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $ArchivoPregunta = new ArchivoPregunta;
                    $ArchivoPregunta-> nombre_archivo_pregunta = $nombreArchivo;
                    $ArchivoPregunta-> descripcion_archivo_pregunta = $descripcion_archivo_pregunta;
                    $ArchivoPregunta-> preguntas_id = $Preguntas->id;
                    $ArchivoPregunta-> save();

                    
                    // Up! Next Value
                    $archivoitem1 = next( $archivoitems1 );
                    $descripcionitem2 = next( $archivoitems2 );
                    
                    
                    
                    // Check terminator
                    if($archivoitem1 === false && $descripcionitem2 === false ) break;
    
                }
            }
       
       
        if ($estado_pregunta=="TRUE") {
            return redirect('/hauser/home-test-preguntas-activas/'.$test_id);
        }else{
            return redirect('/hauser/home-test-preguntas-inactivas/'.$test_id);
        }
            
        
        
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

        $testHauser=Test::all();
        $preguntaSeleccionada=Preguntas::find($id);
        $respuestasPregunta=Respuesta::where('preguntas_id','=',$preguntaSeleccionada->id)
                                        ->get();
        
        
        
        //dd($preguntaSeleccionada->tipo_pregunta);
        //ACTUALIZAR PREGUNTA CON RESPUESTA UNICA
        /*if ($preguntaSeleccionada->tipo_pregunta==2) {

            $respuestaCorrecta=Respuesta::where('preguntas_id','=',$preguntaSeleccionada->id)
                                        ->where('valor_respuesta', TRUE)
                                        ->first();
            
            return view('preguntas.updatePreguntaRespuestaUnicaTest')->with(['testHauser'=>$testHauser,
                                                            'preguntaSeleccionada'=>$preguntaSeleccionada,
                                                            'respuestasPregunta'=>$respuestasPregunta,
                                                            'respuestaCorrecta'=>$respuestaCorrecta
                                                            ]);
        }else{
            //dd('entre');
            //ACTUALIZAR PREGUNTA CON RESPUESTA MULTIPLE updatePreguntaRespuestaMultipleTest
            return view('preguntas.updatePreguntaRespuestaMultipleTest')->with(['testHauser'=>$testHauser,
                                                            'preguntaSeleccionada'=>$preguntaSeleccionada,
                                                            'respuestasPregunta'=>$respuestasPregunta,
                                                            ]);
        }*/
        $respuestaCorrecta=Respuesta::where('preguntas_id','=',$preguntaSeleccionada->id)
                                        ->where('valor_respuesta', TRUE)
                                        ->first();

        $archivosPregunta = ArchivoPregunta::where('preguntas_id','=',$preguntaSeleccionada->id)->get();

        $videosPregunta = VideoPregunta::where('preguntas_id','=',$preguntaSeleccionada->id)->get();
            
            return view('preguntas.updatePreguntasTest')->with(['testHauser'=>$testHauser,
                                                            'preguntaSeleccionada'=>$preguntaSeleccionada,
                                                            'respuestasPregunta'=>$respuestasPregunta,
                                                            'respuestaCorrecta'=>$respuestaCorrecta,
                                                            'videosPregunta'=>$videosPregunta,
                                                            'archivosPregunta'=>$archivosPregunta
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
                
                $descripcion_pregunta = $request['descripcion_pregunta'];
                $solucion_respuesta_unica = $request['solucion_pregunta'];
                $solucion_respuesta_multiple = $request['solucion_respuesta_multiple'];
                $tipo_pregunta = $request['tipo_pregunta'];
                $estado_pregunta = $request['estado_pregunta'];
                $test_id = $request['test_id'];

                $Preguntas = Preguntas::find($id);
                $Preguntas-> descripcion_pregunta = $descripcion_pregunta;
                $Preguntas-> tipo_pregunta = $tipo_pregunta;
                $Preguntas-> estado_pregunta = $estado_pregunta;
                $Preguntas-> tests_id = $test_id;
                
                if ($tipo_pregunta==2) {
                                   
                $Preguntas-> solucion_pregunta = $solucion_respuesta_unica;

                $Preguntas-> save();

                $items1 = ($request['respuesta']);
                $items2 = ($request['respuesta_id']);
                $respuestaUnicaVerdadera = ($request['respuestaUnicaVerdadera']);
                
         /*RESPUESTA UNICA*/
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  respuesta(id, descripcion_respuesta ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $descripcion_respuesta=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $respuesta_id=(( $item2 !== false) ? $item2 : ", &nbsp;");

                    //dd($respuestaUnicaVerdadera);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $Respuesta = Respuesta::find($respuesta_id);
                    $Respuesta-> descripcion_respuesta = $descripcion_respuesta;
                    if ($descripcion_respuesta==$respuestaUnicaVerdadera) {
                        $Respuesta-> valor_respuesta = TRUE;
                    }else{
                        $Respuesta-> valor_respuesta = FALSE;    
                    }
                    $Respuesta-> save();
                    
                    // Up! Next Value
                    $item1 = next( $items1 );
                    $item2 = next( $items2 );
                    
                    // Check terminator
                    if($item1 === false && $item2 === false) break;
    
                }
                Flash::info("La actualizacion de la pregunta fue exitosa");

                }else{

                    $items1 = ($request['respuesta_multiple']);
                    $items2 = ($request['respuestaMultiple_id']);
                    $arrayValidacionRespuesta = ($request['validacion_repuesta']);

                    //dd($items1,$items2,$arrayValidacionRespuesta);
                    $Preguntas-> solucion_pregunta = $solucion_respuesta_multiple;
                    $Preguntas-> save();
                    while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $descripcion_respuesta=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $respuesta_id=(( $item2 !== false) ? $item2 : ", &nbsp;");

                    //dd($respuestaUnicaVerdadera);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $Respuesta = Respuesta::find($respuesta_id);
                    $Respuesta-> descripcion_respuesta = $descripcion_respuesta;
                    if (in_array($respuesta_id, $arrayValidacionRespuesta)) {
                        $Respuesta-> valor_respuesta = TRUE;
                    }else{
                        $Respuesta-> valor_respuesta = FALSE;    
                    }
                    $Respuesta-> save();
                    
                    // Up! Next Value
                    $item1 = next( $items1 );
                    $item2 = next( $items2 );
                    
                    // Check terminator
                    if($item1 === false && $item2 === false) break;
    
                }

                Flash::info("La actualizacion de la pregunta fue exitosa");

                }
                //REQUEST VIDEOS PREGUNTAS
                $itemsNombreVideos = ($request['nombre_video_pregunta']);
                $itemsDescripcionVideos = ($request['descripcion_video_pregunta']);
                $itemsUrlVideos = ($request['url_video_pregunta']);
                $itemsIdVideos = ($request['id_video']);

                if (!is_null($itemsNombreVideos)) {
                /*VIDEOS*/
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $itemNombreVideo = current($itemsNombreVideos);
                    $itemDescripcionVideo = current($itemsDescripcionVideos);
                    $itemUrlVideo = current($itemsUrlVideos);
                    $itemIdVideos = current($itemsIdVideos);

                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $nombre_video_pregunta=(( $itemNombreVideo !== false) ? $itemNombreVideo : ", &nbsp;");
                    $descripcion_video_pregunta=(( $itemDescripcionVideo !== false) ? $itemDescripcionVideo : ", &nbsp;");
                    $url_video_pregunta=(( $itemUrlVideo !== false) ? $itemUrlVideo : ", &nbsp;");
                    $id_video=(( $itemIdVideos !== false) ? $itemIdVideos : ", &nbsp;");
                   

                    //dd($nombre_video_curso,$descripcion_video_curso,$url_video_curso);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                   
                    $VideoPregunta = VideoPregunta::find($id_video);
                    $VideoPregunta-> nombre_video_pregunta = $nombre_video_pregunta;
                    $VideoPregunta-> descripcion_video_pregunta = $descripcion_video_pregunta;
                    $VideoPregunta-> url_video_pregunta = $url_video_pregunta;
                    $VideoPregunta-> save();

                    
                    // Up! Next Value
                    $itemNombreVideo = next( $itemsNombreVideos );
                    $itemDescripcionVideo = next( $itemsDescripcionVideos );
                    $itemUrlVideo = next( $itemsUrlVideos );
                    $itemIdVideos = next( $itemsIdVideos );
                    
                    
                    // Check terminator
                    if($itemNombreVideo === false && $itemDescripcionVideo === false && $itemUrlVideo === false && $itemIdVideos === false) break;
    
                }
            }

            $itemsIdArchivos = ($request['id_archivo']);
            $itemsDescripcionsArchivos = ($request['descripcion_archivo_pregunta']);

            if(!is_null($itemsIdArchivos)){
                  
                
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $idItem1 = current($itemsIdArchivos);
                    $descripcionItem2 = current($itemsDescripcionsArchivos);
                    
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id_archivo=(( $idItem1 !== false) ? $idItem1 : ", &nbsp;");
                    $descripcion_archivo_pregunta=(( $descripcionItem2 !== false) ? $descripcionItem2 : ", &nbsp;");

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $ArchivoPregunta = ArchivoPregunta::find($id_archivo);
                    $ArchivoPregunta-> descripcion_archivo_pregunta = $descripcion_archivo_pregunta;
                    $ArchivoPregunta-> save();
                    
                    // Up! Next Value
                    $idItem1 = next( $itemsIdArchivos );
                    $descripcionItem2 = next( $itemsDescripcionsArchivos );
                    
                    
                    
                    // Check terminator
                    if($idItem1 === false && $descripcionItem2 === false) break;
    
                }
                }


            


        if ($estado_pregunta=="TRUE") {
            return redirect('/hauser/home-test-preguntas-activas/'.$test_id);
        }else{
            return redirect('/hauser/home-test-preguntas-inactivas/'.$test_id);
        }
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

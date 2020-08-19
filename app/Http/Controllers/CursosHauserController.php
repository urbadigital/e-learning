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

//use Input;
use Image; 
 
class CursosHauserController extends Controller
{
    
    public function index(){

        $cursosHauser =DB::Table('cursos')
                    ->join('temas','temas.id', '=','cursos.tema_id')
                    ->select('cursos.*','temas.nombre_tema')
                    ->get();
        
        return view('curso.home-Curso')->with(["cursosHauser"=>$cursosHauser]);
    }

   
   
    public function create(){

        $temasHauser = Tema::all();
        //dd($temasHauser);
        return view('curso.createCurso')->with(["temasHauser"=>$temasHauser]);
      

    }
        
    public function store(Request $request){
        $nombre_curso=$request['nombre_curso'];
        $descripcion_curso=$request['descripcion_curso'];
        $descripcion_cortas_curso=$request['descripcion_cortas_curso'];
        $tipo_nivel_curso=$request['tipo_nivel_curso'];
        //$video_curso=$request['video_curso'];
        $tipo_curso=$request['tipo_curso'];
        if($tipo_curso==1){
            $costo=0;
        }else{
        $costo=$request['costo'];
        }
        $tiempo_inicio_curso=$request['tiempo_inicio_curso'];
        $tiempo_fin_curso=$request['tiempo_fin_curso'];
        $estado_curso=$request['estado_curso'];
        $tema_id=$request['tema_id'];

       
        //dd($tipo_curso);
        if($request->hasFile('anexo')){
        $anexo = $request->file('anexo');   
        $nombreArchivo = strtotime("now").'-'.$anexo->getClientOriginalName();
        Image::make($anexo)
            ->save('images/fotosCursos/'.$nombreArchivo);  
        }else
        $nombreArchivo="Ninguno";

                $items1 = ($request['nombre_video_curso']);
                $items2 = ($request['descripcion_video_curso']);
                $items3 = ($request['url_video_curso']);

                $archivoitems1 = ($request['nombre_archivo_curso']);
                $archivoitems2 = ($request['descripcion_archivo_curso']);
                //dd($archivoitems1);
                
                $Curso = new Curso;
                $Curso-> nombre_curso = $nombre_curso;
                $Curso-> descripcion_curso = $descripcion_curso;
                $Curso-> descripcion_cortas_curso = $descripcion_cortas_curso;
                $Curso-> imagen_curso = $nombreArchivo;
                $Curso-> tipo_nivel_curso = $tipo_nivel_curso;
                //$Curso-> video_curso = $video_curso;
                $Curso-> tipo_curso = $tipo_curso;
                $Curso-> costo = $costo;
                $Curso-> tiempo_inicio_curso = $tiempo_inicio_curso;
                $Curso-> tiempo_fin_curso = $tiempo_fin_curso;
                $Curso-> estado_curso = $estado_curso;
                $Curso-> tema_id = $tema_id;
                
                $Curso-> save();

                //dd($Curso); 

                 /*VIDEOS*/
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    $item3 = current($items3);
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $nombre_video_curso=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $descripcion_video_curso=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $url_video_curso=(( $item3 !== false) ? $item3 : ", &nbsp;");
                   

                    //dd($nombre_video_curso,$descripcion_video_curso,$url_video_curso);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $VideoCurso = new VideoCurso;
                    $VideoCurso-> nombre_video_curso = $nombre_video_curso;
                    $VideoCurso-> descripcion_video_curso = $descripcion_video_curso;
                    $VideoCurso-> url_video_curso = $url_video_curso;
                    $VideoCurso-> curso_id = $Curso->id;
                    $VideoCurso-> save();

                    
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
                    $nombre_archivo_curso=(( $archivoitem1 !== false) ? $archivoitem1 : ", &nbsp;");
                    $descripcion_archivo_curso=(( $descripcionitem2 !== false) ? $descripcionitem2 : ", &nbsp;");

                    $nombreArchivo = strtotime("now").'-'.$nombre_archivo_curso->getClientOriginalName();

                    Storage::disk('curso')->put($nombreArchivo,file_get_contents($nombre_archivo_curso->getRealPath()));
                   

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $ArchivoCurso = new ArchivoCurso;
                    $ArchivoCurso-> nombre_archivo_curso = $nombreArchivo;
                    $ArchivoCurso-> descripcion_archivo_curso = $descripcion_archivo_curso;
                    $ArchivoCurso-> curso_id = $Curso->id;
                    $ArchivoCurso-> save();

                    
                    // Up! Next Value
                    $archivoitem1 = next( $archivoitems1 );
                    $descripcionitem2 = next( $archivoitems2 );
                    
                    
                    
                    // Check terminator
                    if($archivoitem1 === false && $descripcionitem2 === false ) break;
    
                }
                    //dd('llegue al return');
        return redirect('/curso/home-curso-hauser');

    }


    public function vistaCrearCurso(){
        $temas = Tema::all();
        return view('curso.createCurso')->with(["temas"=>$temas]);
    }

   
    

    public function edit($id){

        $cursoSeleccionado=Curso::find($id);
        $temasHauser = Tema::all();
        $archivosCurso = ArchivoCurso::where('curso_id','=',$id)->get();
        $videosCurso = VideoCurso::where('curso_id','=',$id)->get();
        //dd($cursoSeleccionado);

        
        return view('curso.updateCurso')->with(["cursoSeleccionado"=>$cursoSeleccionado,
                                                    "archivosCurso"=>$archivosCurso,
                                                    "temasHauser"=>$temasHauser,
                                                    "videosCurso"=>$videosCurso
                                                    ]);

    }

    public function update(Request $request, $id){

        $nombre_curso=$request['nombre_curso'];
        $descripcion_curso=$request['descripcion_curso'];
        $descripcion_cortas_curso=$request['descripcion_cortas_curso'];
        $tipo_nivel_curso=$request['tipo_nivel_curso'];
        $tipo_curso=$request['tipo_curso'];
        if($tipo_curso==1){
            $costo=0;
        }else{
        $costo=$request['costo'];
        }
        $tiempo_inicio_curso=$request['tiempo_inicio_curso'];
        $tiempo_fin_curso=$request['tiempo_fin_curso'];
        $estado_curso=$request['estado_curso'];
        $tema_id=$request['tema_id'];
        //dd($tipo_curso);
        $cheches = $request['check'];
       //dd($cheches);

                if(!is_null($request['id_video'])){

                $items1 = ($request['nombre_video_curso']);
                $items2 = ($request['descripcion_video_curso']);
                $items3 = ($request['url_video_curso']);
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
                    $nombre_video_curso=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $descripcion_video_curso=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $url_video_curso=(( $item3 !== false) ? $item3 : ", &nbsp;");
                    $id_video=(( $item4 !== false) ? $item4 : ", &nbsp;");
                   

                    //dd($nombre_video_curso,$descripcion_video_curso,$url_video_curso);

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $VideoCurso = VideoCurso::find($id_video);
                    $VideoCurso-> nombre_video_curso = $nombre_video_curso;
                    $VideoCurso-> descripcion_video_curso = $descripcion_video_curso;
                    $VideoCurso-> url_video_curso = $url_video_curso;
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
                /*ACTUALIZA UNICAMENTE LA DESCRIPCION DE LOS ARCHIVOS*/
                if(!is_null($request['id_archivo'])){
                  
                $archivositems1 = ($request['id_archivo']);
                $archivositems2 = ($request['descripcion_archivo_curso']);
                ///////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 3 ARRAYS UNO POR CADA INPUT  video(nombre, descripcion, url ////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $idItem1 = current($archivositems1);
                    $descripcionItem2 = current($archivositems2);
                    
                    
                    
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id_archivo=(( $idItem1 !== false) ? $idItem1 : ", &nbsp;");
                    $descripcion_archivo_curso=(( $descripcionItem2 !== false) ? $descripcionItem2 : ", &nbsp;");

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÃ“N ////////
                    $ArchivoCurso = ArchivoCurso::find($id_archivo);
                    $ArchivoCurso-> descripcion_archivo_curso = $descripcion_archivo_curso;
                    $ArchivoCurso-> save();
                    
                    // Up! Next Value
                    $idItem1 = next( $archivositems1 );
                    $descripcionItem2 = next( $archivositems2 );
                    
                    
                    
                    // Check terminator
                    if($idItem1 === false && $descripcionItem2 === false) break;
    
                }
                }
                /*EDITA EL CURSO*/
        $Curso = Curso::find($id);
        $Curso-> nombre_curso = $nombre_curso;
        $Curso-> descripcion_curso = $descripcion_curso;
        $Curso-> descripcion_cortas_curso = $descripcion_cortas_curso;
        $Curso-> tipo_nivel_curso = $tipo_nivel_curso;
        $Curso-> tipo_curso = $tipo_curso;
        $Curso-> costo = $costo;
        $Curso-> tiempo_inicio_curso = $tiempo_inicio_curso;
        $Curso-> tiempo_fin_curso = $tiempo_fin_curso;
        $Curso-> estado_curso = $estado_curso;
        $Curso-> tema_id = $tema_id;
        $Curso-> save();



        return redirect('/curso/home-curso-hauser');

    }

    public function show($id){
        $cursoSeleccionado= Curso::find($id);
        return view('curso.detalleCurso')->with(["cursoSeleccionado"=>$cursoSeleccionado]);
    }
}

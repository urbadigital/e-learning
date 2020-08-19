@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Pregunta
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <!--page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/wizards.css')}}"/>
    <!--End of page styles-->
     
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/fileinput/css/fileinput.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/blueimp_file_upload/css/jquery.fileupload.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/blueimp_file_upload/css/jquery.fileupload-ui.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/dropify/css/dropify.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/dropzone/css/dropzone.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/file_upload.css')}}">
@stop
@section('content')
    
            <!-- /#left -->
        <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                   <div class="row no-gutters">
                       <div class="col-lg-6 col-md-4 col-sm-4">
                           <h4 class="nav_top_align">
                               <i class="fa fa-pencil"></i>
                               Wizards
                           </h4>
                       </div>
                       <div class="col-lg-6 col-md-8 col-sm-8">
                           <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                               <li class="breadcrumb-item">
                                   <a href="index1.html">
                                       <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                       Dashboard
                                   </a>
                               </li>
                               <li class="breadcrumb-item">
                                   <a href="#">Forms</a>
                               </li>
                               <li class="breadcrumb-item active">Wizards</li>
                           </ol>
                       </div>
                   </div>
                </div>
            </header>
            <div class="outer form_wizzards">
                <div class="inner bg-container">
                    
                    <div class="row">
                        <div class="col">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    <i class="fa fa-file-text-o"></i>
                                    Nuevo pregunta para el test: <strong>{{$testHauser->nombre_test}}</strong> 
                                </div>
                                <div class="card-body m-t-20">
                                    <!--main content-->
                                    <div class="row"> 
                                        <div class="col">
                                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                                            <form id="commentForm" method="POST" action="/hauser/registrar-test-pregunta" class="validate"  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div id="rootwizard">
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab1" data-toggle="tab">
                                                                <span class="userprofile_tab1">1</span>Pregunta</a>
                                                        </li>
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab2" data-toggle="tab">
                                                                <span class="userprofile_tab2">2</span>Videos Pregunta</a>
                                                        </li>
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab3"
                                                               data-toggle="tab"><span>3</span>Archivos Pregunta</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content m-t-20">
                                                        <div class="tab-pane" id="tab1">
                                                            <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="descripcion_pregunta" class="col-form-label">Pregunta*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text  br-0 border-right-0 rounded-left"><i class="fa fa-pencil-square-o text-primary"></i></span>
                                            
                                            <textarea name="descripcion_pregunta" required="" class="form-control" id="descripcion_pregunta" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                              
                                
                                <div class="form-group row" hidden>
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="test_id" class="col-form-label">Test perteneciente*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input  value="{{$testHauser->id}}" type="numeric"  name="test_id" class="form-control" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="estado_pregunta" class="col-form-label">Estado Pregunta*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <select id="estado_pregunta" class="form-control required"  name="estado_pregunta" >
                                                <option value="" selected disabled>Escoja el curso del test</option>
                                                <option value="TRUE">Activo</option>
                                                <option value="FALSE">Inactivo</option>
                                                    
                                                   
                                                                           
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                
                            
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="estado_test" class="col-form-label">Tipo Pregunta *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" value="1" type="radio" onclick="ocultar()" name="tipo_pregunta"
                                                       class="custom-control-input" >
                                                <span class="custom-control-label"></span>
                                                <span class="custom-control-description">Respuesta multiple</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" value="2" type="radio" onclick="mostrar()" name="tipo_pregunta"
                                                       class="custom-control-input" >
                                                <span class="custom-control-label"></span>
                                                <span class="custom-control-description">Respuesta Unica</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="respuestaMultiples" style="display:none" >
                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="respuesta_multiple1" class="col-form-label">Respuesta 1 *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuesta_multiple1" name="respuesta_multiple1" class="form-control" required >
                                        </div>
                                        <div>
                                            <div class="form-check row">
                                                <div class="col-lg-6 px-0">
                                                    <div class="input-group">
                                                        <label for="validacion_repuesta1" class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="validacion_repuesta1" name="validacion_repuesta1" class="custom-control-input">
                                                            <span class="custom-control-label"></span>
                                                            <span class="custom-control-description">Respuesta correcta</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="respuesta_multiple2" class="col-form-label">Respuesta 2 *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuesta_multiple2" name="respuesta_multiple2" class="form-control" required >
                                        </div>
                                        <div>
                                            <div class="form-check row">
                                                <div class="col-lg-6 px-0">
                                                    <div class="input-group">
                                                        <label for="validacion_repuesta2" class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="validacion_repuesta2" name="validacion_repuesta2" class="custom-control-input">
                                                            <span class="custom-control-label"></span>
                                                            <span class="custom-control-description">Respuesta correcta</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="respuesta_multiple3" class="col-form-label">Respuesta 3 *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuesta_multiple3" name="respuesta_multiple3" class="form-control" required >
                                        </div>
                                        <div>
                                            <div class="form-check row">
                                                <div class="col-lg-6 px-0">
                                                    <div class="input-group">
                                                        <label for="validacion_repuesta3" class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="validacion_repuesta3" name="validacion_repuesta3" class="custom-control-input">
                                                            <span class="custom-control-label"></span>
                                                            <span class="custom-control-description">Respuesta correcta</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="respuesta_multiple4" class="col-form-label">Respuesta 4 *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuesta_multiple4" name="respuesta_multiple4" class="form-control" required >
                                        </div>
                                        <div>
                                            <div class="form-check row">
                                                <div class="col-lg-6 px-0">
                                                    <div class="input-group">
                                                        <label for="validacion_repuesta4" class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="validacion_repuesta4" name="validacion_repuesta4" class="custom-control-input">
                                                            <span class="custom-control-label"></span>
                                                            <span class="custom-control-description">Respuesta correcta</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="respuesta_multiple5" class="col-form-label">Respuesta 5 *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuesta_multiple5" name="respuesta_multiple5" class="form-control" required >
                                        </div>
                                        <div>
                                            <div class="form-check row">
                                                <div class="col-lg-6 px-0">
                                                    <div class="input-group">
                                                        <label for="validacion_repuesta5" class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="validacion_repuesta5" name="validacion_repuesta5" class="custom-control-input">
                                                            <span class="custom-control-label"></span>
                                                            <span class="custom-control-description">Respuesta correcta</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="solucion_respuesta_multiple" class="col-form-label">Justificacion de la Respuesta multiple *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text  br-0 border-right-0 rounded-left"><i class="fa fa-pencil-square-o text-primary"></i></span>
                                            
                                            <textarea name="solucion_respuesta_multiple" required="" class="form-control" id="solucion_respuesta_multiple" cols="30" rows="6"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div id="respuestaUnica" style="display:none" >

                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="required2" class="col-form-label">Respuesta 1*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuestaUnica1" name="respuestaUnica1" class="form-control" required >
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="required2" class="col-form-label">Respuesta 2*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuestaUnica2" name="respuestaUnica2" class="form-control" required >
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="required2" class="col-form-label">Respuesta 3*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuestaUnica3" name="respuestaUnica3" class="form-control" required >
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="required2" class="col-form-label">Respuesta 4*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuestaUnica4" name="respuestaUnica4" class="form-control" required >
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="required2" class="col-form-label">Respuesta 5*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuestaUnica5" name="respuestaUnica5" class="form-control" required >
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="required2" class="col-form-label">Respuesta Correcta*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuestaUnicaVerdadera" name="respuestaUnicaVerdadera" class="form-control" required >
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="solucion_pregunta" class="col-form-label">Justificacion de la respuesta unica *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text  br-0 border-right-0 rounded-left"><i class="fa fa-pencil-square-o text-primary"></i></span>
                                            
                                            <textarea name="solucion_pregunta" required="" class="form-control" id="solucion_pregunta" cols="30" rows="6"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                                            
                                <ul class="pager wizard pager_a_cursor_pointer">
                                    <li class="previous">
                                        <a><i class="fa fa-long-arrow-left"></i> Anterior</a>
                                    </li>
                                    <li class="next">
                                        <a>Siguiente <i class="fa fa-long-arrow-right"></i></a>
                                    </li>
                                    <li class="next finish" style="display:none;">
                                        <a>Finish</a>
                                    </li>
                                </ul>
                                </div>



                                <div class="tab-pane" id="tab2">

                                    <div class="form-group row" >
                                        <div class="col-lg-2 text-lg-right">
                                            <label for="estado_test" class="col-form-label">Añadir  Videos *</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="custom-controls-stacked">
                                                <label class="custom-control custom-radio">
                                                    <input id="radio1" value="1" type="radio" onclick="mostrarVideos()" name="videos_pregunta"
                                                           class="custom-control-input" >
                                                    <span class="custom-control-label"></span>
                                                    <span class="custom-control-description">Si</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input id="radio2" value="2" type="radio" onclick="ocultarVideos()" name="videos_pregunta"
                                                           class="custom-control-input" >
                                                    <span class="custom-control-label"></span>
                                                    <span class="custom-control-description">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                
                                                     
                                    

                                        
                                                                
                                        <div class="row" id="formularioVideos" style="display: none">           
                                            <div class="col-md-2 pull-rigth">
                                                <label for=""><strong>Videos de la Pregunta</strong></label> <br>
                                                <button id="adicional" name="adicional" type="button" class="btn btn-warning form-control">Añadir Nuevo Video</button>
                                            </div>
                                                
                                                <table class="table "  id="tabla"> 
                                                     <tr class="fila-fija">
                                                        <td>
                                                            <div class="form-group">
                                                                <input required="" title="El nombre del Video esta vacio" type="text" class="form-control required" id="nombre_video_pregunta" name="nombre_video_pregunta[]" placeholder="Nombre del video"/>
                                                            
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                            <input required="" class="form-control required" id="url_video_contenido" name="url_video_pregunta[]" placeholder="URL"/>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                            <textarea required="" class="form-control required" maxlength="500"  id="descripcion_video_pregunta" name="descripcion_video_pregunta[]" placeholder="Descripcion del video" rows="6" onKeyDown="cuenta()" onKeyUp="cuenta()"></textarea>
                                                            </div>
                                                        </td>
                                                        
                                                        
                                                        <td class="eliminar"><input  type="button" class="btn btn-info form-control"  value="Borrar "/></td>
                                                    </tr>
                                                </table>
                                                 <br>   
                                        </div>
                                    
                                                            
                                                            
                                                            
                                    <ul class="pager wizard pager_a_cursor_pointer">
                                        <li class="previous">
                                            <a><i class="fa fa-long-arrow-left"></i> Anterior </a>
                                        </li>
                                        <li class="next">
                                            <a>Siguiente <i class="fa fa-long-arrow-right"></i></a>
                                        </li>
                                        <li class="next finish" style="display:none;">
                                            <a>Finish</a>
                                        </li>
                                    </ul>
                                </div>
                                    
                                    <div class="tab-pane" id="tab3">
                                        

                                        <div class="form-group row" >
                                        <div class="col-lg-2 text-lg-right">
                                            <label for="estado_test" class="col-form-label">Añadir  Archivos *</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="custom-controls-stacked">
                                                <label class="custom-control custom-radio">
                                                    <input id="radio1" value="1" type="radio" onclick="mostrarArchivos()" name="archivos_pregunta"
                                                           class="custom-control-input" >
                                                    <span class="custom-control-label"></span>
                                                    <span class="custom-control-description">Si</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input id="radio2" value="2" type="radio" onclick="ocultarArchivos()" name="archivos_pregunta"
                                                           class="custom-control-input" >
                                                    <span class="custom-control-label"></span>
                                                    <span class="custom-control-description">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                                            
                                        
                                                                
                                            <div class="row" id="formularioArchivo" style="display: none">

                                                <div class="col-md-2">
                                                    <label for=""><strong>Archivos Curso</strong></label><br>
                                                    <button id="adicional1" name="adicional" type="button" class="btn btn-warning form-control">Añadir Nuevo Archivo</button>
                                                </div>
                                                                                
                                                <br>
                                                <table class="table "  id="tabla1">
                                                    <tr class="fila-fija">
                                                        <td>
                                                            <div class="form-group">
                                                            <input required="" class="form-control required" type="file" value="Seleccione Archivo" id="nombre_archivo_pregunta" name="nombre_archivo_pregunta[]">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                            <textarea required="" class="form-control required" required maxlength="500"  id="descripcion_archivo_pregunta" name="descripcion_archivo_pregunta[]" placeholder="Descripcion del Archivo" rows="6" onKeyDown="cuenta()" onKeyUp="cuenta()"></textarea>
                                                            </div>
                                                        </td>
                                                        <td class="eliminar"><input type="button" class="btn btn-info form-control"  value="Borrar "/></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        
                                                            
                                                            
                                                            
                                        <ul class="pager wizard pager_a_cursor_pointer">
                                                        <li class="previous">
                                                            <a><i class="fa fa-long-arrow-left"></i>
                                                                Previous</a>
                                                        </li>
                                                        <li class="next">
                                                            <a>Next <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                        <li class="next finish" style="display:none;">
                                                            
                                                        </li>
                                        </ul>
                                           <input type="submit" value="Registrar" class="btn btn-primary pull-right">
                                    </div>
                            </div>
                    </div>
                                                <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h4 class="modal-title">Validacion de Formulario</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>El Formulario esta correctamente lleno para proceder con el registros cierre la ventana de dialogo y precione Registrar para finalizar el Registro</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" value="Registrar" class="btn btn-primary pull-right">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--main content end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.inner -->
            <!-- Modal -->
            <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <form>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="float-right" aria-hidden="true">&times;</span>
                            </button>
                            <div class="input-group search_bar_small">
                                <input type="text" class="form-control" placeholder="Search..." name="search">
                                <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
      </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.outer -->
@stop
@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pages/wizard.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/twitter-bootstrap-wizard/js/jquery.bootstrap.wizard.min.js')}}"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    
    <!-- end page level scripts -->
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/fileinput/js/fileinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/fileinput/js/theme.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp_file_upload/js/jquery.ui.widget.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp-tmpl/js/tmpl.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimploadimage/js/load-image.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp-canvas-to-blob/js/canvas-to-blob.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp-gallery-with-desc/js/jquery.blueimp-gallery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp_file_upload/js/jquery.iframe-transport.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp_file_upload/js/jquery.fileupload.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp_file_upload/js/jquery.fileupload-process.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp_file_upload/js/jquery.fileupload-image.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp_file_upload/js/jquery.fileupload-audio.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp_file_upload/js/jquery.fileupload-video.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp_file_upload/js/jquery.fileupload-validate.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/blueimp_file_upload/js/jquery.fileupload-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/dropify/js/dropify.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/dropzone/js/dropzone.js')}}"></script>
<!-- end of global scripts-->
<script type="text/javascript" src="{{asset('assets-in/assets/js/pages/file_upload.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Contenido/comboContenido.js')}}"></script>
    <script src="{{ asset('js/Preguntas/activarTipoPregunta.js') }}"></script>
<script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                    <div class="progress-bar bg-success" style="width:0%;"></div>
                </div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start m-t-10" disabled>
                    <i class="fa fa-arrow-up"></i>
                    <span>Start</span>
                </button>
                {% } %} {% if (!i) { %}
                <button class="btn btn-warning cancel m-t-10">
                    <i class="fa fa-close"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}



</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                    <span>{%=file.name%}</span> {% } %}
                </p>
                {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete m-t-10" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                    <i class="fa fa-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                <button class="btn btn-warning cancel m-t-10">
                    <i class="fa fa-close"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}

</script>
  

@stop
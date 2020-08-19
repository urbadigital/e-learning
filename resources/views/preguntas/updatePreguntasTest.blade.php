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
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-file-text-o"></i>
                            General Wizard
                        </div>
                        <div class="card-body m-t-20">

                            <form id="commentForm" method="POST" action="/hauser/modificar-test-pregunta/{{$preguntaSeleccionada->id}}" class="validate"  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                            <div id="rootwizard_no_val">
                                <ul class="nav nav-pills">
                                    <li class="nav-item user1 m-t-15">
                                        <a class="nav-link" href="#tab11" data-toggle="tab"><span
                                                    class="userprofile_tab">1</span>Pregunta</a>
                                    </li>
                                    <li class="nav-item user2 m-t-15">
                                        <a class="nav-link profile_details" href="#tab21"
                                           data-toggle="tab"><span class="profile_tab">2</span>Videos Pregunta</a>
                                    </li>
                                    <li class="nav-item finish_tab m-t-15">
                                        <a class="nav-link " href="#tab31" data-toggle="tab"><span>3</span>Archivos Pregunta</a>
                                    </li>
                                </ul>
                                <div class="tab-content m-t-20">
                                    <div class="tab-pane" id="tab11">
                                        
                                        <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="descripcion_pregunta" class="col-form-label">Pregunta*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text  br-0 border-right-0 rounded-left"><i class="fa fa-pencil-square-o text-primary"></i></span>
                                            
                                            <textarea name="descripcion_pregunta" required="" class="form-control" id="descripcion_pregunta" cols="30" rows="4">{{$preguntaSeleccionada->descripcion_pregunta}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                              
                                
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="test_id" class="col-form-label">Test perteneciente*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <select id="test_id" class="form-control required"  name="test_id" >
                                                <option value="" selected disabled>Escoja el curso del test</option>
                                                   @foreach($testHauser as $testHauser)
                                                    <option value="{{$testHauser->id}}" {{ ( $preguntaSeleccionada->tests_id == $testHauser->id ) ? 'selected' : '' }} >{{$testHauser->nombre_test}}</option>
                                                   @endforeach
                                                                           
                                            </select>
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
                                                <option value="TRUE" {{ ( $preguntaSeleccionada->estado_pregunta==TRUE) ? 'selected' : '' }} >Activo</option>
                                                <option value="FALSE" {{ ( $preguntaSeleccionada->estado_pregunta==FALSE) ? 'selected' : '' }}>Inactivo</option>
                                                    
                                                   
                                                                           
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                
                            
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="estado_test" class="col-form-label">Tipo Pregunta *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="estado_test" class="col-form-label">
                                                <b>
                                                @if($preguntaSeleccionada->tipo_pregunta==2)
                                                    Respuesta Unica
                                                    <input type="text" hidden="" name="tipo_pregunta" value="{{$preguntaSeleccionada->tipo_pregunta}}">
                                                @else
                                                    Respuesta Multiple
                                                    <input type="text" hidden="" name="tipo_pregunta" value="{{$preguntaSeleccionada->tipo_pregunta}}">
                                                @endif
                                                </b>
                                        </label>
                                    </div>
                                </div>

                                @if($preguntaSeleccionada->tipo_pregunta==2)
                                    @foreach($respuestasPregunta as $respuestasPregunta)
                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="required2" class="col-form-label">Respuesta *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuestaUnica1" name="respuesta[]" class="form-control" required value="{{$respuestasPregunta->descripcion_respuesta}}" >
                                            <input type="text" value="{{$respuestasPregunta->id}}" hidden name="respuesta_id[]">
                                        </div>
                                    </div>
                                    </div>
                                    
                                    @endforeach
                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="required2" class="col-form-label">Respuesta Correcta*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuestaUnicaVerdadera" name="respuestaUnicaVerdadera" class="form-control" required value="{{$respuestaCorrecta->descripcion_respuesta}}">
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
                                            
                                            <textarea name="solucion_pregunta" required="" class="form-control" id="solucion_pregunta" cols="30" rows="6">{{$preguntaSeleccionada->solucion_pregunta}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    @foreach($respuestasPregunta as $respuestasPregunta)
                                    <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="respuesta_multiple1" class="col-form-label">Respuesta *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="respuesta_multiple1" name="respuesta_multiple[]" class="form-control" required value="{{$respuestasPregunta->descripcion_respuesta}}">
                                            <input type="text" hidden name="respuestaMultiple_id[]" value="{{$respuestasPregunta->id}}">
                                        </div>
                                        <div>
                                            
                                            
                                            <div class="form-check row">
                                                <div class="col-lg-6 px-0">
                                                    <div class="input-group">
                                                        <label for="validacion_repuesta{{$respuestasPregunta->id}}" class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="validacion_repuesta{{$respuestasPregunta->id}}" name="validacion_repuesta[]" value="{{$respuestasPregunta->id}}" class="custom-control-input" {{ ( $respuestasPregunta->valor_respuesta) ? 'checked' : '' }}>
                                                            <span class="custom-control-label"></span>
                                                            <span class="custom-control-description">Respuesta correcta</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    @endforeach

                                    <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="solucion_respuesta_multiple" class="col-form-label">Justificacion de la Respuesta multiple *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text  br-0 border-right-0 rounded-left"><i class="fa fa-pencil-square-o text-primary"></i></span>
                                            
                                            <textarea name="solucion_respuesta_multiple" required="" class="form-control" id="solucion_respuesta_multiple" cols="30" rows="6">{{$preguntaSeleccionada->solucion_pregunta}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                @endif

                                        
                                        <ul class="pager wizard pager_a_cursor_pointer">
                                            <li class="previous previous_btn1"><a>Previous</a></li>
                                            <li class="next next_btn1"><a>Next</a></li>
                                        </ul>  
                                        
                                    </div>
                                    <div class="tab-pane" id="tab21">
                                        
                                         @if(sizeof($videosPregunta)==0)
                                                 No existen Videos        
                                            @else                       
                                        <div class="row" id="formularioVideos" >           
                                            <label for="">Videos del Contenido</label><br><br>
                                              <div class="table-responsive">
                                                  <table class="table  table-advance table-hover">

                                                    <thead>
                                                        <tr>
                                                            <th hidden></th>
                                                            <th>Nombre </th>
                                                            <th>URL</th>
                                                            <th>Descripcion</th>
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        
                                                           @foreach($videosPregunta as $videosPregunta)
                                                     <tr >
                                                        <td>
                                                            <div class="form-group">
                                                                <input hidden="" type="numeric" style="width:30px" readonly name="id_video[]"  value="{{$videosPregunta->id}}" /></td>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                            <input required="" title="El nombre del Video esta vacio" class="form-control required" value="{{$videosPregunta->nombre_video_pregunta}}" id="nombre_video_pregunta" name="nombre_video_pregunta[]" placeholder="Nombre del video"/> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                            <input required="" class="form-control required" id="url_video_contenido" value="{{$videosPregunta->url_video_pregunta}}" name="url_video_pregunta[]" placeholder="URL"/>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                            <textarea required="" class="form-control required" maxlength="500"  id="descripcion_video_pregunta" name="descripcion_video_pregunta[]" placeholder="Descripcion del video" rows="6" onKeyDown="cuenta()" onKeyUp="cuenta()">{{$videosPregunta->descripcion_video_pregunta}}</textarea>
                                                            </div>
                                                        </td>
                                                     </tr>   
                                                      @endforeach

                                                        
                                                     
                                                    </tbody>
                                                     
                                                </table>
                                              </div>  
                                                
                                                 <br>   
                                        </div>
                                    
                                       @endif 
                                        <ul class="pager wizard pager_a_cursor_pointer">
                                            <li class="previous previous_btn2"><a>Previous</a></li>
                                            <li class="next next_btn2"><a>Next</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="tab31">
                                        
                                         @if(sizeof($archivosPregunta)==0)
                                                 No Existen archivos       
                                        @else
                                                                
                                            <div class="row" id="formularioArchivo">

                                                <label for="">Videos del Contenido</label><br><br>
                                              <div class="table-responsive">
                                                  <table class="table  table-advance table-hover">

                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Archivo</th>
                                                            <th>Descripcion</th>
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        

                                                         @foreach($archivosPregunta as $archivosPregunta)
                                                     <tr >
                                                        <td>
                                                            <div class="form-group">
                                                                <input hidden="" type="numeric" style="width:30px" readonly name="id_archivo[]" value="{{$archivosPregunta->id}}" /></td>
                                                            </div>
                                                        </td>
                                                        
                                                        
                                                        <td>
                                                            <div class="form-group">
                                                            <a target="_blank" href="{{ route('descargarArchivoPregunta',$archivosPregunta-> nombre_archivo_pregunta) }} ">
                                                                        <i class="fa fa-2x fa-download"></i>
                                                            </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                            <textarea required="" class="form-control required" required maxlength="500"  id="descripcion_archivo_pregunta" name="descripcion_archivo_pregunta[]" placeholder="Descripcion del Archivo" rows="6" onKeyDown="cuenta()" onKeyUp="cuenta()">{{$archivosPregunta->descripcion_archivo_pregunta}}</textarea>
                                                            </div>
                                                        </td>
                                                     </tr>   
                                                      @endforeach

                                                    </tbody>
                                                     
                                                </table>
                                              </div>  
                                                 
                                                
                                            </div>
                                        
                                          @endif
                                        
                                        
                                        <ul class="pager wizard pager_a_cursor_pointer">
                                            <li class="previous previous_btn3"><a>Previous</a></li>
                                            <li class="next"><input type="submit" value="Registrar" class="btn btn-primary pull-right"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
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
@extends(('layouts-admin/compact_menu'))
{{-- Page title --}} 
@section('title')
    Contenido
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
                                    Actualizar Contenido
                                </div>
                                <div class="card-body m-t-20">
                                    <!--main content-->
                                    <div class="row">
                                        <div class="col">
                                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                                            <form id="commentForm" method="POST" action="/contenido/modificar-contenido-curso-hauser/{{$idContenido}}" class="validate" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div id="rootwizard">
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab1" data-toggle="tab">
                                                                <span class="userprofile_tab1">1</span>Contenido</a>
                                                        </li>
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab2" data-toggle="tab">
                                                                <span class="userprofile_tab2">2</span>Videos Contenido</a>
                                                        </li>
                                                        <li class="nav-item m-t-15">
                                                            <a class="nav-link" href="#tab3"
                                                               data-toggle="tab"><span>3</span>Archivos Contenido</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content m-t-20">
                                                        <div class="tab-pane" id="tab1">


                                                            
                                                            
                                                            <div class="form-group">
                                                                <label for="contenido" class="control-label">Nombre Contenido *</label>
                                                                <input id="contenido" name="contenido" type="text"
                                                                       placeholder="Ingrese Nombre Contenido"
                                                                       class="form-control required" value="{{$contenidoActualizar->nombre_contenido}}">
                                                            </div>

                                                            <div class="form-group">
                                                                        <label for="estado_contenido" class="control-label">Estado Contenido *</label>

                                                                        <select class="form-control required" name="estado_contenido" id="estado_contenido">
                                                                            <option value="" disabled selected>Seleccione un Estado</option>
                                                                            <option value="TRUE"{{ ( $contenidoActualizar->estado_contenido == TRUE ) ? 'selected' : '' }}>Activo</option>
                                                                            <option value="FALSE"{{ ( $contenidoActualizar->estado_contenido == FALSE ) ? 'selected' : '' }}>Inactivo</option>
                                                                        </select>
                                                            </div>

                                                            
                                                            
                                                            <div class="form-group">
                                                                <label for="curso_id" class="control-label">Tema Curso *</label>
                                                                 <select class="form-control required" name="curso_id" id="curso_id">
                                                                            <option value="" selected disabled>Escoja Nivel del Curso</option>
                                                                            @foreach($cursoHauser as $cursoHauser)
                                                                                <option value="{{$cursoHauser->id}}"{{ ( $contenidoActualizar->curso_id == $cursoHauser->id ) ? 'selected' : '' }}>{{$cursoHauser->nombre_curso}}</option>

                                                                            @endforeach
                                                                           
                                                                </select>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="descripcion_contenido" class="control-label">Descripcion Contenido
                                                                    *</label>
                                                                <textarea  class="form-control required" id="tinymce_full" rows="7" name="descripcion_contenido" cols="50" >{!!$contenidoActualizar->descripcion_contenido!!}</textarea>
                                                            </div>
                                                            
                                                            <ul class="pager wizard pager_a_cursor_pointer">
                                                                <li class="previous">
                                                                    <a><i class="fa fa-long-arrow-left"></i>
                                                                        Anterior</a>
                                                                </li>
                                                                <li class="next">
                                                                    <a>Siguiente <i class="fa fa-long-arrow-right"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="next finish" style="display:none;">
                                                                    <a>Finish</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                <div class="tab-pane" id="tab2">
                                                            
                                        <div class="form-group">
                                                                
                                                                <div class="row">
                                            
                                            <label for="">Videos del Contenido</label><br><br>
                                            <div class="table-responsive">
                                                <table class="table  table-advance table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Nombre </th>
                                                            <th>URL</th>
                                                            <th>Descripcion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         @foreach($videosContenido as $videosContenido)
                                                         <tr >
                                                            <td><input hidden="" type="numeric" style="width:30px" readonly name="id_video[]"  value="{{$videosContenido->id}}" /></td>
                                                            
                                                            <td><input class="form-control" required name="nombre_video_contenido[]" value="{{$videosContenido->nombre_video_contenido}}" placeholder="Nombre del video"/></td>
                                                            
                                                            <td><input class="form-control" required name="url_video_contenido[]" value="{{$videosContenido->url_video_contenido}}" placeholder="URL"/></td>

                                                            <td>
                                                            <textarea class="form-control" required maxlength="500"  id="exampleTextarea" name="descripcion_video_contenido[]" placeholder="Descripcion del video" rows="6" onKeyDown="cuenta()" onKeyUp="cuenta()">{{$videosContenido->descripcion_video_contenido}}</textarea>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            
                                            </div>
                                            
                                        </div>
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
                                                                    <a>Finish</a>
                                                                </li>
                                                            </ul>
                                </div>
                                <div class="tab-pane" id="tab3">
                                                            
                                    <div class="form-group">
                                                                
                                        <div class="row">
                                            <div class="col-md-6">           
                                                <div class="table-responsive">
                                                    <label class=""> <strong>Archivo Contenido </strong></label>
                                                    <br>
                                                    <table class="table  table-advance table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Archivo</th>
                                                                <th>Descripcion</th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                        @if(sizeof($archivosContenido)==0)
                                                            <tr>
                                                                <td class="text-center" colspan="3">No existe Archivos</td>
                                                                                                    
                                                            </tr>
                                                        @endif
                                                        
                                                        @foreach($archivosContenido as $archivosContenido)
                                                            <tr>
                                                                <td><input hidden="" readonly style="width:30px" name="id_archivo[]" value="{{$archivosContenido->id}}" /></td>
                                                                <td class="text-justify">
                                                                    <a target="_blank" href="{{ route('descargarArchivoContenido',$archivosContenido-> nombre_archivo_contenido) }} ">
                                                                        <i class="fa fa-2x fa-download"></i>
                                                                    </a>
                                                                </td>
                                                                <td class="text-justify">
                                                                                                   
                                                                    <textarea required maxlength="500" class="form-control"  id="exampleTextarea" name="descripcion_archivo_cocntenido[]" placeholder="Descripcion del video" rows="6" onKeyDown="cuenta()" onKeyUp="cuenta()">{{$archivosContenido->descripcion_archivo_contenido}}</textarea> 
                                                                                                    
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                </table>
                                                                        </div>
                                                                     </div>                     
                                                                </div>
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
                                                            <input type="submit" value="Actualizar" class="btn btn-primary pull-right">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="myModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h4 class="modal-title">Wizard</h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>El Registro del Cusro es Exitoso.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" value="Registrar" class="btn btn-primary">
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
@extends(('layouts-admin/compact_menu')) 
{{-- Page title --}}
@section('title')
    Actualizar Contenido
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/inputlimiter/css/jquery.inputlimiter.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/chosen/css/chosen.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/jquery-tagsinput/css/jquery.tagsinput.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/daterangepicker/css/daterangepicker.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/datepicker/css/bootstrap-datepicker.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/bootstrap-switch/css/bootstrap-switch.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/multiselect/css/multi-select.css')}}"/>
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/form_elements.css')}}"/>
    <!-- end of page level styles -->
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-sm-5 col-lg-6">
                    <h4 class="nav_top_align">
                        <i class="fa fa-pencil"></i>
                        Contenido
                    </h4>
                </div>
                <div class="col-sm-7 col-lg-6">
                    <ol  class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index1">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Forms</a>
                        </li>
                        <li class="active breadcrumb-item">Form Validations</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            
            <!-- /.row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-t-0">
                        <div class="card-header bg-white">
                            <i class="fa fa-file-text-o"></i>
                            Actualizar Contenido
                        </div>
                        <div class="card-body ">
                            <form    method="POST" action="/subcontenido/modificar-subcontenido-contenido-curso-hauser/{{$idSubcontenido}}" class="form-horizontal login_validator" id="form_inline_validator" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-xl-2 text-xl-right">
                                        <label for="required" class="col-form-label">Nombre Subcontenido</label>
                                    </div>
                                    <div class="col-xl-4">

                                        <input type="text" class="form-control" required="" id="required" placeholder="Escriba el nombre del Subcontenido" name="nombre_subcontenido" value="{{$subcontenidoSeleccionado->nombre_subcontenido}}"" >

                                        

                                       
                                    </div>
                                    <div class="col-xl-4 error_block">
                                    </div>

                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-xl-2 text-xl-right">
                                        <label for="date" class="col-form-label">Estado</label>
                                    </div>
                                    <div class="col-xl-4">
                                        <select class="form-control" required name="estado_subcontenido">
                                            <option value="" disabled selected>Seleccione un Estado</option>
                                            <option value="TRUE" {{ ( $subcontenidoSeleccionado->estado_subcontenido == TRUE ) ? 'selected' : '' }}>Activo</option>
                                            <option value="FALSE"{{ ( $subcontenidoSeleccionado->estado_subcontenido == FALSE ) ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-4 error_block">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-2 text-xl-right">
                                        <label for="date" class="col-form-label">Contenido del Subontenido</label>
                                    </div>
                                    <div class="col-xl-4">
                                        <select class="form-control hide_search" required name="contenido_id" tabindex="7">
                                            <option value="" selected disabled>Escoja Nivel del Curso</option>
                                                @foreach($contenidoHauser as $contenidoHauser)
                                                 <option value="{{$contenidoHauser->id}}"{{ ( $subcontenidoSeleccionado->contenido_id == $contenidoHauser->id ) ? 'selected' : '' }}>{{$contenidoHauser->nombre_contenido}}</option>

                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-4 error_block">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-2 text-xl-right">
                                        <label for="url" class="col-form-label">Descripción Subcontenido</label>
                                    </div>
                                    <div class="col-xl-4">
                                        <textarea id="autosize" class="form-control" name="descripcion_subcontenido" cols="50" rows="5">{{$subcontenidoSeleccionado->descripcion_subcontenido}}</textarea>
                                    </div>
                                    <div class="col-xl-4 error_block">
                                    </div>
                                </div>
                                
                            <div class="row">
                                <div class="col-md-6">           
                                    <div class="table-responsive">
                                                 <label class=""> <strong>Archivo Subcontenido </strong></label><br>
                                                      <table class="table  table-advance table-hover">
                                                        <thead>
                                                          <tr>
                                                            <th></th>
                                                            <th>Archivo</th>
                                                            <th>Descripcion</th>
                                                            
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(sizeof($archivosSubcontenido)==0)
                                                            <tr>
                                                                <td class="text-center" colspan="3">No existe Archivos</td>
                                                                
                                                            </tr>
                                                            @endif
                                                            @foreach($archivosSubcontenido as $archivosSubcontenido)
                                                          <tr>
                                                            <td><input hidden="" readonly name="id_archivo[]" value="{{$archivosSubcontenido->id}}"" /></td>
                                                            <td class="text-justify">
                                                                <a target="_blank" href="{{ route('descargarArchivoSubcontenido',$archivosSubcontenido-> nombre_archivo_subcontenido) }} ">
                                                                    <i class="fa fa-2x fa-download"></i>
                                                                </a>
                                                            </td>
                                                            <td class="text-justify">
                                                               
                                                               <textarea required maxlength="500" class="form-control"  id="exampleTextarea" name="descripcion_archivo_subcontenido[]" placeholder="Descripcion del video" rows="6" onKeyDown="cuenta()" onKeyUp="cuenta()">{{$archivosSubcontenido->descripcion_archivo_subcontenido}}</textarea> 
                                                                
                                                            </td>
                                                          </tr>
                                                            @endforeach
                                                        </tbody>
                                                      </table>
                                    </div>
                                 </div>                     
                            </div>
                            <hr>
                             
                            <div class="row">
                                            
                                            <label for="">Videos del SubContenido</label><br><br>
                                            <div class="table-responsive">
                                                <table class="table  table-advance table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Nombre </th>
                                                            <th>Descripcion </th>
                                                            <th>URL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         @foreach($videosSubcontenido as $videosSubcontenido)
                                                         <tr >
                                                            <td><input hidden="" type="numeric"  readonly name="id_video[]"  value="{{$videosSubcontenido->id}}" /></td>
                                                            
                                                            <td><input class="form-control" required name="nombre_video_subcontenido[]" value="{{$videosSubcontenido->nombre_video_subcontenido}}" placeholder="Nombre del video"/></td>
                                                            <td>
                                                            <textarea class="form-control" required maxlength="500"  id="exampleTextarea"  name="descripcion_video_subcontenido[]" placeholder="Descripcion del video" rows="6" onKeyDown="cuenta()" onKeyUp="cuenta()">{{$videosSubcontenido->descripcion_video_subcontenido}}</textarea>
                                                            </td>
                                                            <td><input class="form-control"  required name="url_video_subcontenido[]" value="{{$videosSubcontenido->url_video_subcontenido}}" placeholder="URL"/></td>
                                                            
                                                            
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            
                                            </div>
                                            
                                        </div>
    
                                
                                
                                
                                
                                <div class="form-actions form-group row">
                                    <div class="col-xl-10 ml-auto">
                                        <input type="submit" value="Actualizar" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
@stop
@section('footer_scripts')
    <!-- plugin level scripts -->
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/jquery.uniform/js/jquery.uniform.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/inputlimiter/js/jquery.inputlimiter.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/chosen/js/chosen.jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/jquery-tagsinput/js/jquery.tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pluginjs/jquery.validVal.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/daterangepicker/js/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/autosize/js/jquery.autosize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/inputmask/js/inputmask.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/inputmask/js/jquery.inputmask.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/inputmask/js/inputmask.date.extensions.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/inputmask/js/inputmask.extensions.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/multiselect/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.min.js"></script>
    <!--end of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets-in/assets/js/form.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pages/form_elements.js')}}"></script>

@stop

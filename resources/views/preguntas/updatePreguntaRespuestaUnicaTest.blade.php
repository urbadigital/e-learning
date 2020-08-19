@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title') 
    Preguntas 
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/jquery-validation-engine/css/validationEngine.jquery.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/datepicker/css/bootstrap-datepicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/datepicker/css/bootstrap-datepicker3.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/datetimepicker/css/DateTimePicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/form_validations.css')}}" />
    <!-- end of page level styles -->
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-pencil-square-o"></i>
                        Editar Pregunta Respuesta Multiple
                    </h4>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index1">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Users</a>
                        </li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-file-text-o"></i>
                            Información Pregunta
                        </div>
                        <div class="card-body m-t-35">
                            <form id="form_block_validator" method="POST" action="/hauser/modificar-test-pregunta/{{$preguntaSeleccionada->id}}" class="form-horizontal  login_validator"  enctype="multipart/form-data">
                                {{ csrf_field() }}

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
                                        <label for="estado_test" class="col-form-label">Tipo Pregunta *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" value="1" type="radio" onclick="ocultar()" name="tipo_pregunta" class="custom-control-input" {{ ( $preguntaSeleccionada->tipo_pregunta == 1 ) ? 'checked' : '' }}>
                                                <span class="custom-control-label"></span>
                                                <span class="custom-control-description">Respuesta multiple</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" value="2" type="radio" onclick="mostrar()" name="tipo_pregunta" class="custom-control-input" {{ ( $preguntaSeleccionada->tipo_pregunta == 2 ) ? 'checked' : '' }}>
                                                <span class="custom-control-label"></span>
                                                <span class="custom-control-description">Respuesta Unica</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div id="respuestaUnica"  >
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
                                </div>
                                
                              
                                
                                
                                
                                <div class="form-actions form-group row">
                                    <div class="col-xl-8 ml-auto">
                                        <input type="submit" value="Registrar" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
           
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
@stop
@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/jquery-validation-engine/js/jquery.validationEngine.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/jquery-validation-engine/js/jquery.validationEngine-en.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/jquery-validation/js/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datetimepicker/js/DateTimePicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/moment/js/moment.min.js')}}"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets-in/assets/js/form.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pages/form_validation.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/Contenido/comboContenido.js')}}"></script>
    <script src="{{ asset('js/Preguntas/activarTipoPregunta.js') }}"></script>
    <!-- end page level scripts -->

@stop

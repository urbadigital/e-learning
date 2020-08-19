@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Test
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
                        Añadir Test
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
                            Información Test
                        </div>
                        <div class="card-body m-t-35">
                            <form id="form_block_validator" method="POST" action="/hauser/registrar-test" class="form-horizontal  login_validator"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-lg-3  text-lg-right">
                                        <label for="required2" class="col-form-label">Nombre Test *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <input type="text" id="required2" name="nombre_test" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="confirm_password2" class="col-form-label">Curso*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <select id="curso_id" onchange="getSelectValue();" class="form-control required"  name="curso_id" >
                                                <option value="" selected disabled>Escoja el curso del test</option>
                                                    @foreach($cursosHauser as $cursosHauser)
                                                        <option value="{{$cursosHauser->id}}">{{$cursosHauser->nombre_curso}}</option>
                                                    @endforeach
                                                                           
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="confirm_password2" class="col-form-label">Contenido*</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                        <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-file-o text-primary"></i>
                                        </span>
                                            <select  id="contenido_id" class="form-control" name="contenido_id" data-size="10" required="" >
                                            <option value="" >Seleccione el contenido del test</option>  
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="estado_test" class="col-form-label">Estado Test *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" value="TRUE" type="radio" name="estado_test"
                                                       class="custom-control-input">
                                                <span class="custom-control-label"></span>
                                                <span class="custom-control-description">Activo</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" value="FALSE" type="radio" name="estado_test"
                                                       class="custom-control-input" checked="">
                                                <span class="custom-control-label"></span>
                                                <span class="custom-control-description">Inactivo</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="descripcion_test" class="col-form-label">Descripcion test *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text  br-0 border-right-0 rounded-left"><i class="fa fa-pencil-square-o text-primary"></i></span>
                                            
                                            <textarea name="descripcion_test" required="" class="form-control" id="descripcion_test" cols="30" rows="10"></textarea>
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
    <!-- end page level scripts -->

@stop

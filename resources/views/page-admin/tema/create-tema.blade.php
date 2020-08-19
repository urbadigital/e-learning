@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Form Validations
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
                <div class="col-sm-5 col-lg-6">
                    <h4 class="nav_top_align">
                        <i class="fa fa-pencil"></i>
                        TEMA
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
                            Nuevo Tema
                        </div>
                        <div class="card-body m-t-35">
                            <form action="#" class="form-horizontal login_validator" id="form_inline_validator">
                                <div class="form-group row">
                                    <div class="col-xl-2 text-xl-right">
                                        <label for="required" class="col-form-label">Nombre Tema</label>
                                    </div>
                                    <div class="col-xl-4">
                                        <input type="text" id="required" name="Name3" class="form-control">
                                    </div>
                                    <div class="col-xl-4 error_block">
                                    </div>

                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-xl-2 text-xl-right">
                                        <label for="date" class="col-form-label">Estado</label>
                                    </div>
                                    <div class="col-xl-4">
                                        <select class="form-control" >
                                            <option>Item 1</option>
                                            <option>Item 2</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-4 error_block">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-2 text-xl-right">
                                        <label for="url" class="col-form-label">Descripción</label>
                                    </div>
                                    <div class="col-xl-4">
                                        <textarea id="autosize" class="form-control" cols="50" rows="5"></textarea>
                                    </div>
                                    <div class="col-xl-4 error_block">
                                    </div>
                                </div>
                                
                                <div class="form-actions form-group row">
                                    <div class="col-xl-10 ml-auto">
                                        <input type="submit" value="Validate" class="btn btn-primary">
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
    <!-- end page level scripts -->

@stop

@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Editar Institucion
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!-- plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <!--end of page level css-->
    <style>
        .br-0{
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
    </style>
@stop

{{-- Page content --}}
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-user"></i>
                        Actualizar Institucion
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
            <div class="card">

                <div class="card-body m-t-35">
                    <div>
                        <h4>Informacion Institucion</h4>
                    </div>
                    <form method="POST" action="/hauser/modificar-institucion/{{$institucionSeleccionada->id}}" class="form-horizontal login_validator" id="tryitForm" >
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">
                                
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="u-name" class="col-form-label">Nombre de la Institucion*</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                    <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                            <input type="text" class="form-control" required="" name="nombre_institucion" value="{{$institucionSeleccionada->nombre_institucion}}" id="nombre_institucion">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group gender_message row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label class="col-form-label">Estado *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" value="TRUE" type="radio" name="estado_institucion"
                                                       class="custom-control-input"{{ ( $institucionSeleccionada->estado_institucion == TRUE ) ? 'checked' : '' }}>
                                                <span class="custom-control-label"></span>
                                                <span class="custom-control-description">Activo</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" value="FALSE" type="radio" name="estado_institucion"
                                                       class="custom-control-input"{{ ( $institucionSeleccionada->estado_institucion == FALSE ) ? 'checked' : '' }}>
                                                <span class="custom-control-label"></span>
                                                <span class="custom-control-description">Inactivo</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="email" class="col-form-label">Descripcion Institucion*</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text  br-0 border-right-0 rounded-left"><i class="fa fa-envelope text-primary"></i></span>
                                            
                                            <textarea name="descripcion_institucion" required="" class="form-control" id="descripcion_institucion" cols="30" rows="10">{{$institucionSeleccionada->descripcion_institucion}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                <div class="form-group row">
                                    <div class="col-lg-9 ml-auto">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-user"></i>
                                            Agregar Institucion
                                        </button>
                                        <button class="btn btn-warning" type="reset" id="clear">
                                            <i class="fa fa-refresh"></i>
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- /.inner -->
    </div>


@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jasny-bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/validation.js')}}"></script>
    <!-- end of plugin scripts-->
@stop
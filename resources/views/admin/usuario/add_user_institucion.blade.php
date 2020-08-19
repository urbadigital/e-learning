@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Add User
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!-- plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
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
                        Añadir Usuario
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
                        <h4>Información Personal</h4>
                    </div>
                    <form class="form-horizontal login_validator" id="tryitForm" action="/hauser/registrar-institucion-usuario"
                          method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-center text-lg-right">
                                        <label class="col-form-label">Imagen Usuario</label>
                                    </div>
                                    <div class="col-lg-6 text-center text-lg-left">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new  text-center">
                                                <img width="170"  height="170" src="/storage/User/default-user-image.png"  id="myImage"  alt="not found">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists img-thumbnail"></div>
                                            <div class="m-t-20 text-center">
                                                        <span class="btn btn-primary btn-file">
                                                            <span class="fileinput-new">Seleccionar Imagen</span>

                                                            <input type="file" name="avatar"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <div class="form-group row m-t-25" hidden>
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="institucion" class="col-form-label">Institucion *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                    <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-building text-primary"></i>
                                    </span>
                                            <input type="text" name="institucion_id" value="{{$institucion_id}}">

                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="u-name" class="col-form-label">Nombre *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                    <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                            <input required type="text" name="name" id="u-name"
                                                   class="form-control">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="u-name" class="col-form-label">Apellido *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                    <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                            <input required type="text" name="lastname" id="u-name"
                                                   class="form-control">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row m-t-25">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="u-name" class="col-form-label">Nombre Usuario *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                    <span class="input-group-text br-0 border-right-0 rounded-left"> <i class="fa fa-blind text-primary"></i>
                                    </span>
                                            <input required type="text" name="username" id="u-name"
                                                   class="form-control">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="email" class="col-form-label">Email
                                            *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text  br-0 border-right-0 rounded-left"><i class="fa fa-envelope text-primary"></i></span>
                                            <input required type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder=" " title="mail@example.com" id="email" name="email"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="phone" class="col-form-label">Telefono
                                            *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text br-0 border-right-0 rounded-left"><i class="fa fa-phone text-primary"></i></span>
                                            <input type="text" placeholder=" " id="phone" name="numero"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="pwd" class="col-form-label">Password
                                            *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text br-0 border-right-0 rounded-left"><i class="fa fa-lock text-primary"></i></span>
                                            <input required type="password" name="password" id="pwd"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 text-lg-right">
                                        <label for="cpwd" class="col-form-label">Confirm
                                            Password *</label>
                                    </div>
                                    <div class="col-xl-6 col-lg-8">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text br-0 border-right-0 rounded-left"><i class="fa fa-lock text-primary"></i></span>
                                            <input required type="password" name="confirmpassword" placeholder=" " id="cpwd"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-9 ml-auto">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-user"></i>
                                            Añadir Usuario
                                        </button>
                                        <button class="btn btn-warning" type="reset" id="clear">
                                            <i class="fa fa-refresh"></i>
                                            Refrescar
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
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pluginjs/jasny-bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pages/validation.js')}}"></script>
    <!-- end of plugin scripts-->
@stop

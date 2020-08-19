@extends(('layouts-admin/compact_menu'))
@section('title')
    Radio and Checkbox
    @parent
    @stop
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/bootstrap-switch/css/bootstrap-switch.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/switchery/css/switchery.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/radio_css/css/radiobox.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/checkbox_css/css/checkbox.min.css')}}" />
    <!--End of Plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/radio_checkbox.css')}}" />
    <!--End of Page level styles-->
    @stop
@section('content')
            <header class="head">
                <div class="main-bar">
                    <div class="row no-gutters">
                        <div class="col-sm-5 col-lg-6 skin_txt">
                            <h4 class="nav_top_align">
                                <i class="fa fa-pencil"></i>
                                Radio & Checkbox
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
                                <li class="active breadcrumb-item">Radio & Checkbox</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-container">
                    <div class="row radio_custom_checkbox">
                        <div class="col">
                            <div class="card">
                                <div class="card-header radio_card_bg">
                                   Test: <strong>{{$testHauser->nombre_test}}</strong>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal">
                                        
                                         <div class="row">
                                            <div class="col-12 col-md-6 m-t-35">
                                                @foreach($preguntasHauser as $preguntasHauser)
                                                <h5 class="checkbox_header_bottom">{{$preguntasHauser->descripcion_pregunta}}</h5>
                                                <div  class="left_align custom-controls-stacked">
                                                    @if($preguntasHauser->tipo_pregunta==1)

                                                        @foreach($preguntasHauser->respuesta as $respuestaMultiple)
                                                    <label class="custom-control custom-checkbox ">
                                                            <input type="checkbox" class="custom-control-input" name="default_checkbox{{$preguntasHauser->id}}">
                                                            <span class="custom-control-label custom_checkbox_success"></span>
                                                            <span class="custom-control-description text-success">{{$respuestaMultiple->descripcion_respuesta}}</span>
                                                    </label>
                                                        @endforeach
                                                    @else


                                                        @foreach($preguntasHauser->respuesta as $respuestaUnica)
                                                    
                                                    <label  class="custom-control custom-radio">
                                                            <input  type="radio" name="default_radio{{$preguntasHauser->id}}" class="custom-control-input">
                                                            <span class="custom-control-label custom_checkbox_success"></span>
                                                            <span class="custom-control-description text-success">{{$respuestaUnica->descripcion_respuesta}}</span>
                                                    </label>
                                                   
                                                        @endforeach
                                                   @endif
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>  
                                        
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
@stop
@section('footer_scripts')
<!--Plugin scripts-->
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-in/assets/vendors/switchery/js/switchery.min.js')}}"></script>
<!--End of plugin scripts-->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets-in/assets/js/pages/radio_checkbox.js')}}"></script>
<!--End of Page level scripts-->
@stop
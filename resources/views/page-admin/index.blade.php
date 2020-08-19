@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Home - Administrador
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/chartist/css/chartist.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/circliful/css/jquery.circliful.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/index.css')}}">
@stop
@section('content')

    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        <i class="fa fa-home"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container"> 

            <!--top section widgets-->
            
            <div class="row">
                <div class="col-lg-6">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="card m-t-0">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i>Temas &nbsp;&nbsp; <small><a href="#">ver más </a></small>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive m-t-35">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            <i class="fa fa-briefcase"></i> Nombre
                                        </th>
                                        <th class="hidden-xs">
                                            <i class="fa fa-user"></i> Estado
                                        </th>
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="highlight">
                                            <span class="success"></span>
                                            <a href="#">HP</a>
                                        </td>
                                        <td class="hidden-xs">Ramos</td>
                                        
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="info"></span>
                                            <a href="#">Google</a>
                                        </td>
                                        <td class="hidden-xs">Adam</td>
                                        
                                        
                                    </tr>
                                    <tr>
                                        <td class="highlight">
                                            <span class="success"></span>
                                            <a href="#">Apple</a>
                                        </td>
                                        <td class="hidden-xs">Daniel</td>
                                        
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="warning"></span>
                                            <a href="#">Microsoft</a>
                                        </td>
                                        <td class="hidden-xs">Nick</td>
                                        
                                        
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->

                    
                </div>
                <div class="col-lg-6">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="card m-t-0">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"></i>Cursos 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive m-t-35">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            <i class="fa fa-briefcase"></i> Nombre
                                        </th>
                                        <th class="hidden-xs">
                                            <i class="fa fa-user"></i> Tema 
                                        </th>
                                        <th class="hidden-xs">
                                            <i class="fa fa-user"></i> Estado
                                        </th>
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="highlight">
                                            <span class="success"></span>
                                            <a href="#">HP</a>
                                        </td>
                                        <td class="highlight">
                                            <span class="success"></span>
                                            <a href="#">HP</a>
                                        </td>
                                        <td class="hidden-xs">Ramos</td>
                                        
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="info"></span>
                                            <a href="#">Google</a>
                                        </td>
                                        <td class="highlight">
                                            <span class="success"></span>
                                            <a href="#">HP</a>
                                        </td>
                                        <td class="hidden-xs">Adam</td>
                                        
                                        
                                    </tr>
                                    <tr>
                                        <td class="highlight">
                                            <span class="success"></span>
                                            <a href="#">Apple</a>
                                        </td>
                                        <td class="highlight">
                                            <span class="success"></span>
                                            <a href="#">HP</a>
                                        </td>
                                        <td class="hidden-xs">Daniel</td>
                                        
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="warning"></span>
                                            <a href="#">Microsoft</a>
                                        </td>
                                        <td class="highlight">
                                            <span class="success"></span>
                                            <a href="#">HP</a>
                                        </td>
                                        <td class="hidden-xs">Nick</td>
                                        
                                        
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
                



                
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col m-t-35">
                            <div class="weather_img">
                                <div class="row header_align">
                                    <div class="col-sm-8 col-7 text-white info">
                                        <div class="city">City: Bangkok</div>
                                        <div class="night">Night - 21:17 PM</div>

                                        <div class="temp">4<sup>o</sup></div>
                                        <div class="wind">
                                            <span>28 km/h</span>
                                        </div>
                                    </div>
                                    <div class="icon col-5 col-sm-4">
                                        <img src="{{asset('assets-in/assets/img/weather1.png')}}" alt="weather" class="img-fluid">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="background_opacity">
                                            <div class="row header_align">
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Mon</div>
                                                        <div>
                                                            <img src="{{asset('assets-in/assets/img/w5.png')}}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">30<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Tue</div>
                                                        <div>
                                                            <img src="{{asset('assets-in/assets/img/w2.png')}}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">29<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Wed</div>
                                                        <div>
                                                            <img src="{{asset('assets-in/assets/img/w3.png')}}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">34<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Thu</div>
                                                        <div>
                                                            <img src="{{asset('assets-in/assets/img/w4.png')}}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">32<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 border_right days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Fri</div>
                                                        <div>
                                                            <img src="{{asset('assets-in/assets/img/w5.png')}}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">35<sup>o</sup></div>
                                                    </div>
                                                </div>
                                                <div class="col-2 days_margin_top">
                                                    <div class="day text-center">
                                                        <div class="day_font">Sat</div>
                                                        <div>
                                                            <img src="{{asset('assets-in/assets/img/w2.png')}}" alt="weather" class="img-fluid">
                                                        </div>
                                                        <div class="day_font">36<sup>o</sup></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card m-t-35">

                        <div class="card-body m-t-10">
                            <!--<svg id="fillgauge1"  width="100%" height="193"></svg>-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Average Monthly Uploads</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="test-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <br />
                                    <span id="monthly_upload"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 m-t-35">
                    <div class="social-counter text-center">
                        <ul class="m-b-0">
                            <li class="facebook">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-facebook"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count"><span id="fb_count">354</span>K</span> Likes</div>
                                    </div>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-twitter"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count" id="tw_count">547</span> Followers</div>
                                    </div>
                                </a>
                            </li>
                            <li class="google">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-google-plus"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count" id="g+_count">678</span> Followers</div>
                                    </div>
                                </a>
                            </li>

                            <li class="instagram">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-instagram"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count">2M</span> Followers</div>
                                    </div>
                                </a>
                            </li>
                            <li class="linkedin">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-linkedin"></i></span></div>
                                        <div class="col-8 text-left social_fa_top"><span class="count" id="in_count">124</span> Followers</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer_scripts')
    <!--  plugin scripts -->
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/countUp.js/js/countUp.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/flip/js/jquery.flip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pluginjs/jquery.sparkline.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/chartist/js/chartist.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pluginjs/chartist-tooltip.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/swiper/js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/circliful/js/jquery.circliful.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/flotchart/js/jquery.flot.js')}}" ></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/flotchart/js/jquery.flot.resize.js')}}"></script>
    <!--end of plugin scripts-->

    <script type="text/javascript" src="{{asset('assets-in/assets/js/pages/index.js')}}"></script>
@stop

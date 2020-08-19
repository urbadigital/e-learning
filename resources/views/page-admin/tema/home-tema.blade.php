@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Advanced Tables
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/select2/css/select2.min.css')}}"/>
    <link type="text/css" rel="stylesheet"
          href="{{asset('assets-in/assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/dataTables.bootstrap.css')}}"/>
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/tables.css')}}"/>
    <!--End of page level styles-->
@stop


<!-- /#left -->
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-4 col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-th"></i>
                        Advanced Tables
                    </h4>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index1">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Tables</a>
                        </li>
                        <li class="breadcrumb-item active">Advanced Tables</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <!-- editable data  table starts-->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-table"> </i> <strong>TEMAS REGISTRADOS </strong>
                        </div>
                        <div class="card-body">
                            <div class="m-t-35">
                                <table id="example" class="table display nowrap" >
                                    <thead>
                                    <tr>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                        <th>E-mail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Aurore</td>
                                            <td>Balistreri</td>
                                            <td>Principal Program Administrator</td>
                                            <td>North Adeline</td>
                                            <td>46</td>
                                            <td>1959-8-27</td>
                                            <td>$9798</td>
                                            <td>Aurore74@hotmail.com</td>
                                        </tr>
                                        <tr>
                                            <td>Aurore</td>
                                            <td>Balistreri</td>
                                            <td>Principal Program Administrator</td>
                                            <td>North Adeline</td>
                                            <td>46</td>
                                            <td>1959-8-27</td>
                                            <td>$9798</td>
                                            <td>Aurore74@hotmail.com</td>
                                        </tr>
                                        <tr>
                                            <td>Aurore</td>
                                            <td>Balistreri</td>
                                            <td>Principal Program Administrator</td>
                                            <td>North Adeline</td>
                                            <td>46</td>
                                            <td>1959-8-27</td>
                                            <td>$9798</td>
                                            <td>Aurore74@hotmail.com</td>
                                        </tr>
                                        <tr>
                                            <td>Aurore</td>
                                            <td>Balistreri</td>
                                            <td>Principal Program Administrator</td>
                                            <td>North Adeline</td>
                                            <td>46</td>
                                            <td>1959-8-27</td>
                                            <td>$9798</td>
                                            <td>Aurore74@hotmail.com</td>
                                        </tr>
                                        <tr>
                                            <td>Aurore</td>
                                            <td>Balistreri</td>
                                            <td>Principal Program Administrator</td>
                                            <td>North Adeline</td>
                                            <td>46</td>
                                            <td>1959-8-27</td>
                                            <td>$9798</td>
                                            <td>Aurore74@hotmail.com</td>
                                        </tr>
                                        <tr>
                                            <td>Aurore</td>
                                            <td>Balistreri</td>
                                            <td>Principal Program Administrator</td>
                                            <td>North Adeline</td>
                                            <td>46</td>
                                            <td>1959-8-27</td>
                                            <td>$9798</td>
                                            <td>Aurore74@hotmail.com</td>
                                        </tr><tr>
                                            <td>Aurore</td>
                                            <td>Balistreri</td>
                                            <td>Principal Program Administrator</td>
                                            <td>North Adeline</td>
                                            <td>46</td>
                                            <td>1959-8-27</td>
                                            <td>$9798</td>
                                            <td>Aurore74@hotmail.com</td>
                                        </tr><tr>
                                            <td>Aurore</td>
                                            <td>Balistreri</td>
                                            <td>Principal Program Administrator</td>
                                            <td>North Adeline</td>
                                            <td>46</td>
                                            <td>1959-8-27</td>
                                            <td>$9798</td>
                                            <td>Aurore74@hotmail.com</td>
                                        </tr><tr>
                                            <td>Aurore</td>
                                            <td>Balistreri</td>
                                            <td>Principal Program Administrator</td>
                                            <td>North Adeline</td>
                                            <td>46</td>
                                            <td>1959-8-27</td>
                                            <td>$9798</td>
                                            <td>Aurore74@hotmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- end of responsive tables-->
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->

@stop

<!-- /#wrap -->


<!-- global scripts-->

@section('footer_scripts')
    <!-- end of global scripts-->
    <!-- plugin scripts -->
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/select2/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <!-- end plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pages/advanced_tables.js')}}"></script>
    <!-- end of global scripts-->

@stop
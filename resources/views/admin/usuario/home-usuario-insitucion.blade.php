@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Usuarios
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/select2/css/select2.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/dataTables.bootstrap.css')}}"/>
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/tables.css')}}"/>
    <!-- end of page level styles -->

@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-lg-6 col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-user"></i>
                        Usuario Grid
                    </h4>
                </div>
               
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-header bg-white">
                    Usuario Grid
                </div>
                <div class="card-body m-t-35" id="user_body">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <a href="/hauser/create-institucion-usuario/{{$institucion_id}}" id="editable_table_new" class=" btn btn-default">
                                Añadir Usuario  <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="btn-group float-right users_grid_tools">
                            <div class="tools"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <table class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_table" role="grid">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">Nombre</th>
                                    <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">Apellido</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Nombre Usuario</th>
                                    <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">Email</th>
                                    <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">institucion</th>
                                    <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($UsuariosInstitucionHauser as $UsuariosInstitucionHauser)
                                    <tr role="row" class="even">
                                        <td class="sorting_1">{{$UsuariosInstitucionHauser->name}}</td>
                                        <td class="sorting_1">{{$UsuariosInstitucionHauser->lastname}}</td>
                                        <td class="sorting_1">{{$UsuariosInstitucionHauser->username}}</td>

                                        
                                        <td class="center">{{$UsuariosInstitucionHauser->email}}</td>
                                        <td class="center">{{$UsuariosInstitucionHauser->nombre_institucion}}</td>
                                       
                                        
                                        <td>
                                            <a href="view_user" data-toggle="tooltip" data-placement="top" title="Usuarios de Institucion"><i class="fa fa-eye text-success"></i></a>
                                            &nbsp; &nbsp;
                                            <a class="edit" data-toggle="tooltip" data-placement="top" title="Editar" href="/hauser/editar-institucion-usuario/{{$UsuariosInstitucionHauser->id}}"><i class="fa fa-pencil text-warning"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                 

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
@stop
@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/select2/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('assets-in/assets/vendors/datatables/js/dataTables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datatables/js/buttons5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-in/assets/vendors/datatables/js/buttons.print.min.js')}}"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets-in/assets/js/pages/users.js')}}"></script>
    <!-- end page level scripts -->
@stop

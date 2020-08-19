@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Cursos
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
                        <i class="fa fa-pencil"></i>
                        Cursos Grid
                    </h4>
                </div>
               
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-header bg-white">
                    <i class="fa fa-file-text-o"></i>
                    Cursos Grid
                </div>
                <div class="card-body m-t-35" id="user_body">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <a href="/curso/create-curso-hauser" id="editable_table_new" class=" btn btn-default">
                                Añadir Curso  <i class="fa fa-plus"></i>
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
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Imagen</th>
                                    <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">Curso</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Descripcion</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Inicio curso</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Final Curso</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Estado</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Tema</th>
                                    <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($cursosHauser as $cursosHauser)
                                    <tr role="row" class="even">
                                        <td class="text-center"> <img style="border-radius: 100%;height: 60px;width: 60px" src="{{asset('images/fotosCursos/'.$cursosHauser->imagen_curso)}}">
                                        </td>
                                        <td class="sorting_1">{{$cursosHauser->nombre_curso}}</td>
                                        <td class="sorting_1">{!!$cursosHauser->descripcion_cortas_curso!!}</td>
                                        <td class="sorting_1">{{$cursosHauser->tiempo_inicio_curso}}</td>
                                        <td class="sorting_1">{{$cursosHauser->tiempo_fin_curso}}</td>
                                        <td class="sorting_1">
                                            @if($cursosHauser->estado_curso)
                                            Activo
                                            @else
                                            Inactivo
                                            @endif
                                        </td>

                                        <td class="sorting_1">{{$cursosHauser->nombre_tema}}</td>
                                        
                                        <td>
                                            <a href="view_user" data-toggle="tooltip" data-placement="top" title="Usuarios de Institucion"><i class="fa fa-eye text-success"></i></a>
                                            &nbsp; &nbsp;
                                            <a class="edit" data-toggle="tooltip" data-placement="top" title="Editar" href="/curso/vista-editar-curso-hauser/{{$cursosHauser->id}}"><i class="fa fa-pencil text-warning"></i></a>
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
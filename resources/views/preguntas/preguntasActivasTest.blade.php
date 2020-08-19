@extends(('layouts-admin/compact_menu'))
{{-- Page title --}}
@section('title')
    Preguntas
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
                        Preguntas Grid
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
                    Preguntas Activas del test: <b>{{$testHauser->nombre_test}}</b>
                </div>
                <div class="card-body m-t-35" id="user_body">

                    <div class="panel-heading">
                            @include('flash::message')
                    </div>

                    <div class="table-toolbar">
                        <div class="form-group">
                            <a href="/hauser/create-test-pregunta/{{$testHauser->id}}" id="editable_table_new" class=" btn btn-default">
                                Añadir Pregunta <i class="fa fa-plus"></i>
                            </a>

                            <a href="/hauser/home-test"  class="btn btn-warning float-right">
                                 <i class="fa fa-arrow-left"></i> Atras
                            </a>
                        </div> <br>
                        <div class="btn-group float-right users_grid_tools">
                            <div class="tools"></div>
                        </div>
                    </div>
                    <div>

                        <div>
                            <table class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_table" role="grid">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Test</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Pregunta</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Respuestas</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Respuesta Correcta</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Solucion Pregunta</th>
                                    <th class="sorting_asc wid-10" tabindex="0" rowspan="1" colspan="1">Tipo pregunta </th>
                                    <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(sizeof($preguntasHauser)==0)
                                                         <tr>
                                                            <td class="text-center" colspan="7">No existen preguntas activas</td>
                                                        </tr>
                                    @endif
                                    @foreach($preguntasHauser as $preguntasHauser)
                                    <tr role="row" class="even">
                                        <td class="sorting_1">{{$preguntasHauser->nombre_test}}</td>
                                        <td class="sorting_1">{{$preguntasHauser->descripcion_pregunta}}</td>
                                        
                                        <td class="sorting_1">

                                        @foreach($preguntasHauser->respuesta as $respuestas)
                                            {{$respuestas->descripcion_respuesta}} <br>
                                        @endforeach

                                        </td>
                                        <td class="sorting_1">

                                        @foreach($preguntasHauser->respuesta as $respuestasCorrecta)
                                            @if($respuestasCorrecta->valor_respuesta)
                                            {{$respuestasCorrecta->descripcion_respuesta}} <br>
                                            @endif
                                        @endforeach

                                        </td>
                                        <td class="sorting_1">{!!$preguntasHauser->solucion_pregunta!!}</td>
                                        <td class="sorting_1">
                                            @if($preguntasHauser->tipo_pregunta==1)
                                            Respuesta multiple
                                            @else
                                            Respuesta unica
                                            @endif
                                        </td>
                                        <td>
                                            <a class="edit" data-toggle="tooltip" data-placement="top" title="Editar" href="/hauser/editar-test-pregunta/{{$preguntasHauser->id}}"><i class="fa fa-pencil text-warning"></i></a>
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

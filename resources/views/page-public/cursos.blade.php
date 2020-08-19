@extends('layouts.default')

@section('title', 'inicio')

@push('css')
    {{-- <link href="/assets/plugins/jquery-jvectormap/jquery-jvectormap.min.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" /> --}}
@endpush

@section('content')

   <section class="pop-cour">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <h2>Todos <span>los Programas</span></h2>
                    <p>Describir todos los cursos aquí .</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <!--POPULAR COURSES-->
                        @foreach($cursosHauser as $cursoHauser)
                        <div class="col-md-6 home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="col-md-3">
                                <img src="{{asset('images/fotosCursos/'.$cursoHauser->imagen_curso)}}" alt=""> </div>
                            <!--POPULAR COURSES: CONTENT-->
                            <div class="col-md-8 home-top-cour-desc">
                                <a href="course-details.html">
                                    <h3>{{ $cursoHauser->nombre_curso  }}</h3>
                                </a>
                                <h4>{{$cursoHauser->nombre_tema}}</h4>
                                <p>{{ $cursoHauser->descripcion_cortas_curso }}</p> <span class="home-top-cour-rat">4.2</span>
                                <div class="hom-list-share">
                                    <ul>
                                        <li><a href="course-details.html"><i class="fa fa-eye" aria-hidden="true"></i>Ingresar</a> </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        

                        <!--POPULAR COURSES-->
                        
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

@endsection




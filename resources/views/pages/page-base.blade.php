@extends('layouts.default', ['topMenu' => true])

@section('title', 'Administrador Insumos')

@push('css')
	<link href="/assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" />
@endpush

@section('content')
	
	<div class="row">
		<div class="col-lg-12">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-left">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item active"><a href="javascript:;">Administrador de Insumos </a></li>
				
			</ol>
			
		</div>
		
	</div>

	<!-- end breadcrumb -->
	<!-- begin page-header -->
	{{-- <h1 class="page-header">Social Buttons <small>header small text goes here...</small></h1> --}}
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<!-- begin col-8 -->
		<div class="col-lg-9">
			<!-- begin panel -->
			<div class="panel panel-inverse" style="border: 1px solid #e2e7eb;">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					
					<h4 class="panel-title">Administrador de Insumos</h4>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body p-3">
					<!-- begin table-responsive -->
					Hola
					<!-- end table-responsive -->
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-8 -->
		<!-- begin col-4 -->
		<div class="col-lg-3">
			<div class="lead m-b-20">
				<p class="m-b-5">Texto</p>
				<a href="#" target="_blank" class="btn btn-sm btn-inverse">Regresar<i class="fa fa-arrow-right m-l-5"></i></a>
			</div>
			<div class="m-b-10"><b>Social Icons</b></div>
			<div class="clearfix m-b-20">
				Texto
			</div>
			<div class="m-b-10"><b>Different Sizes</b></div>
			<div class="m-b-10">
				<p>
					Texto 1
				</p>
				<p>
					Texto 1
				</p><p>
					Texto 1
				</p>
			</div>
		</div>
		<!-- end col-4 -->
	</div>
	<!-- end row -->
@endsection

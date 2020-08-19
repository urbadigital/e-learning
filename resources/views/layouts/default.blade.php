<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('includes.head')
	<!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
     <link href="{{asset('plugins/summernote/dist/summernote.css')}}" rel="stylesheet" />
</head>

<body>
	@include('includes.top-menu')

	<div>

	@yield('content')
				
	</div>
	@include('includes.social-media')
	@include('includes.footer')
	@include('includes.page-js')
</body>
</html>

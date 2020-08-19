<meta charset="utf-8" />
<title>Hauser | @yield('title')</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />


<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta name="description" content="Education master is one of the best educational html template, it's suitable for all education websites like university,college,school,online education,tution center,distance education,computer education">
<meta name="keyword" content="education html template, university template, college template, school template, online education template, tution center template">


{{-- BEGIN BASE CSS STYLE --}}
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
   


    @section('head')
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet" />
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->
    @show

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    @section('start_css')
        
        <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        
         <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
        <link href="{{ asset('css/style-mob.css') }}" rel="stylesheet" />
        
    @show
    <!-- ================== END
   
@stack('css')




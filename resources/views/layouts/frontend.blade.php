<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    @yield('meta')


    <link rel="shortcut icon" sizes="16x16" href="{{asset('assets/setting/'.App\Models\Setting::first()->favicon)}}"> <!-- favicon,  Edit it -->
    <link rel="icon" type="image/x-icon" sizes="16x16" href="{{asset('assets/setting/'.App\Models\Setting::first()->favicon)}}"> <!-- favicon,  Edit it -->

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <!-- Jquery autocomplete -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
 
    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css.map') }}" rel="stylesheet">
    <link href="{{ asset('frontend/js/bootstrap.bundle.min.js.map') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/owl/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/owl/owl.theme.default.min.css')}}">
   <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">    
   <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">


</head>
<body>

@include('layouts.front_inc.front_navbar')


<div class="content {{App\Models\Setting::first()->body_color}}">
  @yield('content')
</div>


<div class="whats-app">
  <a href="https://wa.me/+8801781856861?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
    <img src="{{asset('assets/image/whats-app.jpg')}}" alt="Whats app logo" height="70px" width="70px">
  </a>
</div>


@include('layouts.front_inc.footer')



<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/628a7c727b967b117990a976/1g3mfc8ai';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->


  <!--Autocomplete script-->
  <script src="{{asset('js/auto_complete.js')}}"></script>
  <!--   Custome JS Files   -->
  <script src="{{asset('js/custom.js')}}"></script>
    <!--   Checkout JS Files   -->
  <script src="{{asset('js/checkout.js')}}"></script>
  <!--   Bootstrap JS Files   -->
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>  
  <!--   owl JS Files   -->
  <script src="{{asset('frontend/owl/owl.carousel.min.js')}}"></script>
  <!--   Sweet alert JS Files   -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  @if(session('status'))
        <script>
         swal("{{ session('status') }}");
        </script>    
  @endif   

  @yield('scripts')
 

     
</body>
</html>

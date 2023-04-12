<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

 

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  
    <!-- Jquery autocomplete -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  
    <!-- Styles -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
            @include('layouts.inc.sidebar')

            <div class="main-panel">
                  
                  @include('layouts.inc.adminnav')
                  <div class="content">@yield('content')</div>
                  @include('layouts.inc.adminfooter')

            </div>

                              <!-- includinh blade component -->
   

      </div> 


  <!--   MCE Html Editor   -->    
  <script src="https://cdn.tiny.cloud/1/k9v76halqypql8umijekmas8ngbsunz21pageat02ybsqpte/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#myMce',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
      toolbar_mode: 'floating',
    });      
 </script>
   <!--Autocomplete script-->
   <script src="{{asset('js/auto_complete.js')}}"></script>
  <!--   Core JS Files   -->
  <script src="{{ asset('admin/js/jquery.min.js')}}"></script>
  <script src="{{ asset('admin/js/popper.min.js')}}"></script>
  <script src="{{ asset('admin/js/bootstrap-material-design.min.js')}}"></script>
  <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if(session('status'))
        <script>
         swal("{{ session('status') }}");
        </script>    
  @endif   
  @yield('scripts')
 

     
</body>
</html>

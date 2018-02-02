<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Admin - @yield('title')</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="{!! asset('css/app.css') !!}">

      @section('css')
      @show
  </head>
  <body>
    <div class="wrapper">
      @include('admin.partials.sidebar')

      <div class="container">
          @yield('content')
      </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function () {
        $('.sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
        });
        
        $('[data-toggle="tooltip"]').tooltip(); 
      });
    </script>
  </body>
</html>
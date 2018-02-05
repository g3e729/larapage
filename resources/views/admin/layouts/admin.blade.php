<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Admin Web Management</title>
      <link rel="stylesheet" href="{!! asset('css/package/bootstrap.css') !!}">
      <link rel="stylesheet" href="{!! asset('css/package/font-awesome.css') !!}">
      {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
      <link rel="stylesheet" href="{!! asset('css/admin.css') !!}">

      @section('css')
      @show
  </head>
  <body>
    @yield('content')

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="{!! asset('js/bootstrap.js') !!}"></script>

    <script type="text/javascript">
      $(document).ready(function () {
        $('.sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
        });
        
        // $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
  </body>
</html>
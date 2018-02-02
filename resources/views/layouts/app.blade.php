<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>{{ env('APP_NAME') }} - @yield('title')</title>

      @section('css')
      @show
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
          @yield('content')
      </div>
    </div>
  </body>
</html>
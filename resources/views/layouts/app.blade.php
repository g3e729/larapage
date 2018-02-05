<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
        <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
      <link rel="stylesheet" href="{!! asset('css/package/bootstrap.css') !!}">
      <link rel="stylesheet" href="{!! asset('css/package/font-awesome.css') !!}">

    <!-- Libraries CSS Files -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{!! asset('css/global.css') !!}" rel="stylesheet">

    @section('css')
    @show
</head>

  <body>
    @include('partials.header')

    <main id="main">
      @yield('content')
    </main>

    @include('partials.footer')

    {{-- <script src="{!! asset('js/pages.js') !!}"></script> --}}

  </body>
</html>
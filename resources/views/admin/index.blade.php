@extends('admin.layouts.admin')

@section('css')
@endsection

@section('content')
  <div id="app">
  </div>
  
  <script>
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
    ]); ?>
  </script>
  <script src="{{ asset('js/admin.js') }}"></script>

@endsection

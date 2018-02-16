@extends('admin.layouts.admin')

@section('css')
@endsection

@section('content')
  <div id="app">
  </div>
  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.1/ace.js" type="text/javascript" charset="utf-8"></script>
  
  <script>
  	window.Kal = ace;
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
    ]); ?>
  </script>
  <script src="{{ asset('js/admin.js') }}"></script>

@endsection

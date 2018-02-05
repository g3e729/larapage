@extends('layouts.app')

@section('title', ucwords($page->title))

@section('content')
  <section class="hero hght-mid" style="background: url({{ $page->file->path ?? '' }}) !important;">
    <div class="hero-container">
    </div>
  </section>

  <div class="container">
    <div class="row">

      <div>
  		  <h2><span>{{ $page->title }}</span></h2>
  		  <p>{{ $page->description }}</p>
  		</div>

    </div>
  </div>
@endsection
@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <section class="hero hght-full">
    <div class="hero-container">
      <h1>Welcome to <span>{{ env('APP_NAME') }}</span></h1>
      <h2>Trying hard laravel framework developer</h2>
      <a href="#about" class="btn-get-started">Get Started</a>
    </div>
  </section>

  <div class="container">
    <div class="row">
      
      <div id="about">
        <h2><span>{{ env('APP_NAME') }}</span></h2>
        <p>
          A simple page management for all, for free!
        </p>
      </div>

    </div>
  </div>
@endsection
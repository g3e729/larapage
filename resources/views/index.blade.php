@extends('layouts.app')

@section('title', 'Home')

@section('css')
    @parent
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
  <a href="/">Home</a>
	<a href="/about-us">About Us</a>
  <p>This is my body content.</p>
@endsection
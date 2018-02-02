@extends('layouts.app')

@section('title', $page->description)

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
  <p>{{ $page->description }}</p>
@endsection
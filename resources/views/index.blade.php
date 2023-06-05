@extends('layouts.master')
@section('title', 'Home')

@include('components.navbar')
@section('content')
    
    <div class="container">
       @include('posts.index')
    </div>

    
   

@endsection

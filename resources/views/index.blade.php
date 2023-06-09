@extends('layouts.master')
@section('title', 'Facebook at home')

@include('components.navbar')
@section('content')
    
    <div class="container">
       @include('posts.index')
    </div>

    
   

@endsection

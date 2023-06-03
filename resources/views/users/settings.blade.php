@extends('layouts.master')
@section('title', 'Settings')
@section('content')
    @include('components.navbar')

   <div class="container">
        <h3>Account Settings</h3>

        First Name: {{ auth()->user()->firstname }} <br>
        Last Name: {{ auth()->user()->lastname }} <br>
        Email: {{ auth()->user()->email }} <br>
        <a href="">change password</a>
        
   </div>

@endsection
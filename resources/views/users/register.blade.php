@extends('layouts.master')
@section('title', 'Register')
@section('content')
    
<form method="POST" action="/register">
    @csrf
    <div class="container mt-5 justify-content-center d-flex">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title text-center">Register</h5>
              <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email') }}">
            @error('email')
                <span class="text-danger"> {{ $message}} </span>
            @enderror
              <input type="text" class="form-control my-2" name="firstname" placeholder="First Name" required value="{{ old('firstname') }}">
            @error('firstname')
                <span class="text-danger"> {{ $message}} </span>
            @enderror
              <input type="text" class="form-control" name="lastname" placeholder="Last Name" required value="{{ old('lastname') }}">
            @error('lastname')
              <span class="text-danger"> {{ $message}} </span>
            @enderror
              <input type="password" class="form-control my-2" name="password" placeholder="Password" required>
              @error('password')
              <span class="text-danger"> {{ $message}} </span>
            @enderror
              <input type="password" class="form-control my-2" name="password_confirmation" placeholder="Confirm Password" required>
              <input type="submit" class="btn btn-primary form-control" value="Register">
                    Already have an account? <a href="/login" style=" color: blue;">Login</a>
            </div>
          </div>
    </div>
</form>

@endsection

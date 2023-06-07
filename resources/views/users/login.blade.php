@extends('layouts.master')

@section('title', 'Login')
    
@section('content')
    
<form method="POST" action="/login">.
    @csrf
    <div class="container mt-5 justify-content-center d-flex">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <label class="text-danger"> {{ $message }} </label>
                @enderror
                <input type="password" class="form-control my-2" name="password" placeholder="Password">
                <input type="submit" class="btn btn-primary form-control" value="Login">
                Dont have an account? <a href="/register" style=" color: blue;">Register</a>
            </div>
          </div>
    </div>
</form>

@endsection

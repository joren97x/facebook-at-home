@extends('layouts.master')

@section('title', 'Login')
<style>
    #register_modal .form-control {
        background-color: rgb(245,246,247)
    }
    
</style>
@section('content')
    
<form method="POST" action="/login">.
    @csrf
    <div class="container-fluid mt-5 ">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6">
                @if(count($fersons) !== 0)
                <img src="{{ asset('images/fblogo.png') }}" class="ms-5" style="height: 100px; width: 180px; object-fit:fill">
                <div class="row ms-5">
                    <h2> Recent Logins  </h2>
                    <p style="color: gray"> Click your picture or add an account. </p>
                </div>
                <div class="row justify-content-center">
                          
                        @foreach($fersons as $ferson)

                        <x-recent-login-user-card :ferson="$ferson" />

                        @endforeach

                        <div class="col-3 card mx-3 mt-3" style=" background-color: rgb(240,240,240)">
                            <div class="card-img-top text-center" style="margin-top: 50%;height: 95px; object-fit: cover; max-width: 100%;">
                                <i class="bi bi-plus-circle-fill text-primary h1"></i>
                            </div>
                            <h5 class="card-title text-center" style="background-color: white">Add Account</h5>
                        </div>
                </div>
                @else

                <img src="{{ asset('images/fblogo.png') }}" class="ms-5" style="height: 150px; width: 250px; object-fit:fill">
                <h2 class="mx-5"> Connect with friends and the world around you on Facebook. </h2>
                @endif
            </div>
            <div class="card col-5 mt-5 shadow" style="width: 25rem; height: 280px">
                <div class="card-body">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                    <input type="password" class="form-control my-2" name="password" placeholder="Password">
                    <input type="submit" class="btn btn-primary fw-bold form-control" style="font-size: 18px;" value="Log In">
                    <a href="" class="text-primary mt-2 justify-content-center d-flex">Forgot password?</a>
                    <hr>
                     <div class="row justify-content-center">
                        <div class="col-8">
                            <button class="btn form-control text-light fw-bold" type="button" style="background-color: rgb(66,183,42); font-size: 18px" data-bs-toggle="modal" data-bs-target="#register_modal" > Create new account </button>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="register_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" >
          <span> THE FUCK </span>
          <br>
          BOANG
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/register">
                @csrf
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="firstname" placeholder="First name" required value="{{ old('firstname') }}">
                                @error('firstname')
                                    <span class="text-danger"> {{ $message}} </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="lastname" placeholder="Last name" required value="{{ old('lastname') }}">
                                @error('lastname')
                                <span class="text-danger"> {{ $message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body">
                          <input type="email" class="form-control mt-2" name="email" placeholder="Email" required value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger"> {{ $message}} </span>
                        @enderror
                        
                          <input type="password" class="form-control my-2" name="password" placeholder="New password" required>
                          @error('password')
                          <span class="text-danger"> {{ $message}} </span>
                            @enderror
                          <input type="password" class="form-control my-2" name="password_confirmation" placeholder="Confirm password" required>
                          Birthday

                            <div class="row">
                              <div class="col">
                                <input type="date" name="birthday" class="form-control">
                                @error('birthday')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                              </div>
                            </div>
                          Gender
                            <div class="row">
                                <div class="col-3 mx-3 border rounded p-2">
                                    <span>
                                        Male <input type="radio" name="gender" value="male" style="margin-left: 40%">
                                    </span>
                                </div>
                                <div class="col-3 mx-3 border rounded p-2">
                                    <span>
                                        Female <input type="radio" name="gender" value="female" style="margin-left: 25%">
                                    </span>
                                </div>
                                <div class="col-3 mx-3 border rounded p-2">
                                    <span>
                                        Other <input type="radio" name="gender" id="other_gender" style="margin-left: 40%">
                                    </span>
                                </div>
                            </div>


                            <div class="row mt-2" hidden>
                                <div class="col">
                                    <input type="text" placeholder="Gender" class="form-control">
                                </div>
                            </div>
                          
                            <p style="color: gray; font-size: 13px" class="mt-2">
                                By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy.
                            </p>

                            <div class="row justify-content-center d-flex">
                                <div class="col-2 justify-content-center d-flex">
                                    <input type="submit" class="btn text-light fw-bold "style="background-color: rgb(66,183,42); font-size: 18px" value="Sign Up">
                                </div>
                            </div>
                        </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    if($('#other_gender').change('checked')) {
      console.log("CHJECKED")
    }
  </script>

@endsection

@extends('layouts.master')
@section('title', 'Settings')
@section('content')
<link rel="stylesheet" href="/css/post-card-profile.css">
    @include('components.navbar')

    <div class="container">
     <h3 class="text-center">Account Settings</h3>
 <hr>
     <h5>Firstname:</h5> {{ auth()->user()->firstname }}
     <h5>Lastname:</h5> {{ auth()->user()->lastname }}
     <h5>Email:</h5> {{ auth()->user()->email }}
     <br>
     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
 </div>

 <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
          <form method="POST" action="profile/updateAccount">
               @csrf
               @method('PUT')
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Account</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <div class="row">
               <div class="col">
                    Firstname: <input type="text" name="firstname" class="form-control" value="{{ auth()->user()->firstname }}">
                    @error('firstname')
                         <span class="text-danger"> {{ $message}} </span>
                    @enderror
               </div>
               <div class="col">
                    Lastname: <input type="text" name="lastname" class="form-control" value="{{ auth()->user()->lastname }}">
                    @error('lastname')
                         <span class="text-danger"> {{ $message}} </span>
                    @enderror
               </div>
           </div>
           <div class="row">
               <div class="col">
                    Email: <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                    @error('email')
                         <span class="text-danger"> {{ $message }} </span>
                    @enderror
               </div>
           </div>
           <div class="row w-50">
               <div class="col">
                    Current password: <input type="password" name="current_password" class="form-control">
                    @error('current_password')
                         <span class="text-danger"> {{ $message }} </span>
                    @enderror
               </div>
           </div>
           <div class="row w-50">
               <div class="col">
                    New password: <input type="password" name="password" class="form-control">
                    @error('password')
                         <span class="text-danger"> {{ $message }} </span>
                    @enderror
               </div>
           </div>
           <div class="row w-50">
               <div class="col">
                    Confirm password: <input type="password" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
                         <span class="text-danger"> {{ $message }} </span>
                    @enderror
               </div>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Update</button>
         </div>
     </form>
       </div>
     </div>
   </div>

 

@endsection
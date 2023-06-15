@extends('layouts.master')
<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/post-card-profile.css">

@section('title',  $user->firstname . ' ' . $user->lastname )

@section('content')
@include('components.navbar')
   
    <div class="container">
        
      <div class="row bg-secondary" style="height: 230px"></div>

        <div class="row" >
            <div class="col-2"></div>
            <div class="col-8 justify-content-center d-flex">
                <span class="h1">
                    <div class="profile-picture">
                            <img src="{{ asset('images/'.$user->profile_pic) }}" id="profile-picture" alt="Profile Picture">
                        @if( auth()->user()->id == $user->id )
                            <label for="file-input" class="edit-icon"> <i class="bi bi-camera-fill"></i> </label>
                            <form method="POST" id="changeprofileform" action="/profile/changeProfilePic"> @csrf @method('PUT') <input id="file-input" class="file-input" name="profile_pic" type="file" accept="image/*"> </form>
                        @endif
                    </div>
                
                </span>
                <div class="row mt-4">
                  
                  <span class="ms-4"> <label class="fs-1 fw-bold">{{ $user->firstname . ' ' . $user->lastname }}</label>  <br>
                      <label for=""> 
                        <form action="/profile/updateBio" method="POST" id="bio-form">
                            @method('PUT')
                            @csrf
                            <textarea cols="50" @if(auth()->user()->id != $user->id) disabled @endif name="bio" id="bio-text" style="border: none; background-color:rgb(240,242,245);"> {{ $user->bio }} </textarea> 
                        </form>
                      </label>
                   </span>

                </div>
            </div>
            <div class="col-2"></div>
        </div>

        

         <div class="container row justify-content-around">

            @if($posts->isEmpty())
              <div class="card my-3 fs-1 text-center" style="width: 35rem;">
                No posts found.
              </div>
            @else
            {{-- <div class="col-3">  </div> --}}
            <div class="col-6">
              @foreach($posts as $post)
                  <x-post-card :post="$post" />
              @endforeach
            </div>
            {{-- <div class="col-3"> </div> --}}
            @endif
    </div>
         

    </div>

    <script>

$(document).ready(function() {

$('#bio-text').on("keypress", function(event) {

  if(event.keyCode === 13 && !event.shiftKey) {
    event.preventDefault();
    $('#bio-form').submit();
  }


})


$('#profile-picture').on('click', function() {
  var imageUrl = $(this).attr('src');
  $('#modal-profile-picture').attr('src', imageUrl);
  $('#profilePictureModal').modal('show');
});
});

        document.getElementById("file-input").addEventListener("change", function(event) {
          var file = event.target.files[0];
          var reader = new FileReader();
    
          reader.onload = function(e) {
            document.querySelector(".profile-picture img").src = e.target.result;
            document.getElementById('changeprofileform').submit();
          }
    
          reader.readAsDataURL(file);
        });

        
        </script>
        
    {{-- ModAL WHEN SHOWING THE FULL PICTURE OF PROFILE PIC --}}
      <div class="modal fade" id="profilePictureModal" tabindex="-1" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <img id="modal-profile-picture" src="" style="width: 100%; height: 100%" alt="Profile Picture" class="img-fluid">
            </div>
          </div>
        </div>
      </div>

@endsection
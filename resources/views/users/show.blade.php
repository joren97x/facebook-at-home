@extends('layouts.master')
<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/post-card-profile.css">

@section('title',  $user->firstname . ' ' . $user->lastname )

@section('content')
@include('components.navbar')
   
    <div class="container">
        
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 justify-content-center d-flex">
                <span class="h1">
                    <div class="profile-picture">
                        @if(Empty($user->profile_pic))
                            <img src="{{ asset('images/default.png') }}" id="profile-picture" alt="Profile Picture">
                        @else
                            <img src="{{ asset('images/'.$user->profile_pic) }}" id="profile-picture" alt="Profile Picture">
                        @endif
                        @if( auth()->user()->id == $user->id )
                            <label for="file-input" class="edit-icon"> <i class="bi bi-camera-fill"></i> </label>
                            <form method="POST" id="changeprofileform" action="/profile/changeProfilePic"> @csrf @method('PUT') <input id="file-input" class="file-input" name="profile_pic" type="file" accept="image/*"> </form>
                        @endif
                    </div>
                {{ $user->firstname . ' ' . $user->lastname }} 
                </span>
            </div>
            <div class="col-2"></div>
        </div>

        

         <div class="container">
            <div class="row justify-content-center">

            @if($posts->isEmpty())
                <h1>No posts found</h1>
            @else
            
            @foreach($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
            @endif
            </div>
         </div>

    </div>

    <script>
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
      <script>
        $(document).ready(function() {
          $('#profile-picture').on('click', function() {
            var imageUrl = $(this).attr('src');
            $('#modal-profile-picture').attr('src', imageUrl);
            $('#profilePictureModal').modal('show');
          });
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
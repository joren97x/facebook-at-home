@extends('layouts.master')
<link rel="stylesheet" href="/css/profile.css">
@section('content')
@include('components.navbar')
   
    <div class="container">
        
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 justify-content-center d-flex">
                <span class="h1">
                    <div class="profile-picture">
                        @if(Empty($user->profile_pic))
                            <img src="{{ asset('images/default.png') }}" alt="Profile Picture">
                        @else
                            <img src="{{ asset('images/'.$user->profile_pic) }}" alt="Profile Picture">
                        @endif
                        <label for="file-input" class="edit-icon"> <i class="bi bi-camera-fill"></i> </label>
                        <form method="POST" id="changeprofileform" action="/profile/changeProfilePic"> @csrf @method('PUT') <input id="file-input" class="file-input" name="profile_pic" type="file" accept="image/*"> </form>
                      </div>
                {{ $user->firstname . ' ' . $user->lastname }}
                </span>
            </div>
            <div class="col-2"></div>
        </div>

        

         <div class="container">
            @if($posts->isEmpty())
                <h1>No posts found</h1>
            @else
            @foreach($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
            @endif
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

@endsection
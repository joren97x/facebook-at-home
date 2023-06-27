@extends('layouts.master')
<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/post-card-profile.css">

@section('title',  $user->firstname . ' ' . $user->lastname )

@section('content')
@include('components.navbar')
   
    <div class="container ">
        
      <div class="row bg-secondary" style="height: 230px"> 
        <img src="{{ asset('images/mystore.jpg') }}" style="object-fit: cover; width: 100%; height: 230px" alt="">  
      </div>

        <div class="row bg-light shadow rounded">
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
                            <textarea cols="50" @if(auth()->user()->id != $user->id) disabled @endif name="bio" class="bg-light" id="bio-text" style="border: none;"> {{ $user->bio }} </textarea> 
                        </form>
                      </label>
                   </span>

                </div>
            </div>
            <div class="col-4" style="margin-top: 100px">
              <button class="btn btn-primary" id="add_friend_button"> <i class="bi bi-person-plus-fill text-light"></i> Add friend</button>
              <button class="btn" style="background-color: rgb(228,230,235)"> <i class="bi bi-envelope-plus-fill"></i> Message</button>
            </div>
            <hr>
            <div class="row justify-content-start profile-info mb-2">
              <div class="col-1"><button class="btn profile-button">Posts  </button></div>
              <div class="col-1"><button class="btn profile-button">About</button></div>
              <div class="col-1"><button class="btn profile-button">Friends</button></div>
              <div class="col-1"><button class="btn profile-button">Photos</button></div>
              <div class="col-1"><button class="btn profile-button">Videos</button></div>
              <div class="col-1"><button class="btn profile-button">More</button></div>
            </div>
        </div>

        

         <div class="container row">

          <div class="col-5 mt-2">
            <div class="card shadow">
              <div class="row">
                <h5 class="m-2">Intro</h5>
              </div>
              <label class="text-center"> {{ $user->bio }} </label>
              <hr>

              <div class="row m-2"><span> <i class="bi bi-mortarboard-fill"></i> <label for=""> Went to Bayag National High School </label> </span> </div>
              <div class="row m-2"> <span> <i class="bi bi-house-fill"></i> <label> Lives in Burat, Samar, Philippines </label> </span>  </div>
              <div class="row m-2"> <span> <i class="bi bi-heart-fill"></i> <label> Single </label> </span>  </div>
              <div class="row m-2"> <span> <i class="bi bi-github"></i> <label> DreamyBullxX </label> </span>  </div>
            </div>
            <div class="card mt-3 shadow">
              <div class="row">
                <div class="col-7"><h5 class="m-2">Photos</h5></div>
                <div class="col-5 mt-2 text-primary">See all photos</div>
              </div>
              <label class="text-center"> {{ $user->bio }} </label>
              <hr>

              <div class="row m-2"><span> <i class="bi bi-mortarboard-fill"></i> <label for=""> Went to Bayag National High School </label> </span> </div>
              <div class="row m-2"> <span> <i class="bi bi-house-fill"></i> <label> Lives in Burat, Samar, Philippines </label> </span>  </div>
              <div class="row m-2"> <span> <i class="bi bi-heart-fill"></i> <label> Single </label> </span>  </div>
              <div class="row m-2"> <span> <i class="bi bi-github"></i> <label> DreamyBullxX </label> </span>  </div>
            </div>
            <div class="card mt-3 shadow">
              <div class="row">
                <div class="col-7"><h5 class="m-2">Friends</h5></div>
                <div class="col-5 mt-2 text-primary">See all friends</div>
              </div>
              <label class="text-center"> {{ $user->bio }} </label>
              <hr>

              <div class="row m-2"><span> <i class="bi bi-mortarboard-fill"></i> <label for=""> Went to Bayag National High School </label> </span> </div>
              <div class="row m-2"> <span> <i class="bi bi-house-fill"></i> <label> Lives in Burat, Samar, Philippines </label> </span>  </div>
              <div class="row m-2"> <span> <i class="bi bi-heart-fill"></i> <label> Single </label> </span>  </div>
              <div class="row m-2"> <span> <i class="bi bi-github"></i> <label> DreamyBullxX </label> </span>  </div>
            </div>
          </div>

            <div class="col-7 justify-content-center d-flex ">
              <div class="row">
                @if($posts->isEmpty())
              
                <h1 class="mt-3"> No posts found. </h1>
             
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

    </div>
         

    </div>

    <script>

$(document).ready(function() {

  $(document).on('click', '#add_friend_button', function() {
    
    $.ajax({
      url: '/user/add-friend-request',
      type: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
        user_id: '{{ auth()->user()->id }}',
        friend_id: '{{ $user->id }}',
        status: 'pending'
      },
      success: function(response) {
        console.log(response);
        $('#add_friend_button').empty()
        $('#add_friend_button').append($('<i>').addClass('bi bi-person-x-fill').text(' Cancel request'))
        $('#add_friend_button').attr('id', 'cancel_friend_button')
      },
      error: function(error) {
        console.log(error);
      }
    })

  })

  $(document).on('click', '#cancel_friend_button', function() {

    $.ajax({
      url: '/user/cancel-friend-request',
      type: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
        user_id: '{{ auth()->user()->id }}',
        friend_id: '{{ $user->id }}',
        status: 'cancel'
      },
      success: function(response) {
        console.log(response);
        $('#cancel_friend_button').empty()
        $('#cancel_friend_button').append($('<i>').addClass('bi bi-person-plus-fill').text(' Add friend'))
        $('#cancel_friend_button').attr('id', 'add_friend_button')
      },
      error: function(error) {
        console.log(error);
      }
    })

  })


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
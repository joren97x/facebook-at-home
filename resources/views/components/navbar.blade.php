<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container-fluid bg-body-tertiary border shadow sticky-top">
    @auth
    <div class="row">
        <div class="col-4">
            <a href="/"> <img src=" {{ asset('/images/fblogo.png') }} " alt="" style="height: 50px; width: 130px"> </a>
        </div>
        <div class="col-4 justify-content-center d-flex my-2">
            <div class="input-group">
                <span class="input-group-text  rounded-start-pill  border-end-0" style="background-color: rgb(238, 238, 238);">
                    <i class="bi bi-search" style=" color: gray"></i></span>
                <input type="text" id="search-input" name="search" class="border-0 rounded-end-pill border-start-0"
                    placeholder="Search" style="outline: none; box-shadow: none; padding-right: 200px;background-color: rgb(238, 238, 238); color: gray">
            </div>
        </div>

        {{-- SCRIPT FOR AUTO COMPLETE --}}
        <script>

            $(document).ready(function () {

                $('#search-input').on('input', function () {
                    console.log($('#search-input').val())
                    var search_input =  $('#search-input').val()
                    $.ajax({
                        type: 'GET',
                        url: "/search",
                        data: {
                            search_input: search_input,
                        },
                            success: (response) => {
                            console.log(response)
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })
                })

            })

        </script>

        <div class="col-4 justify-content-end d-flex">

            <div class="dropdown">
                <a class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(auth()->user()->profile_pic)
                        <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar">
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="Avatar" class="post-avatar">
                    @endif
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/profile/{{ auth()->user()->id }}">Profile</a></li>
                  <li><a class="dropdown-item" href="/settings">Settings</a></li>
                  <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <input type="submit" class="btn dropdown-item" value="Logout">
                    </form>
                    </li>
                </ul>
              </div>
        </div>
        

        
    </div>
    @else
    <div class="row">
        <div class="col-10">
            Social Life 
        </div>
        <div class="col-1">
            <a href="/login">Login</a>
        </div>
        <div class="col-1">
            <a href="/register">Register</a>
        </div>
    </div>
    @endauth
</div>
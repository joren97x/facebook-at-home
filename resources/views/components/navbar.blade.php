<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container-fluid bg-body-tertiary">
    @auth
    <div class="row">
        <div class="col-4">
            <a href="/">facebook at home</a>
        </div>
        <div class="col-4 justify-content-center d-flex my-2">
            <div class="input-group" >
                <span class="input-group-text rounded-start-pill bg-transparent border-end-0"><i
                        class="bi bi-search"></i></span>
                <input type="text" id="search-input" name="search" class="form-control rounded-end-pill border-start-0"
                    placeholder="Search" style="outline: none; box-shadow: none">
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
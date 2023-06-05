<div class="container-fluid bg-body-tertiary">
    @auth
    <div class="row">
        <div class="col-9">
            <a href="/">Index</a>
        </div>
        <div class="col-1">
            
        </div>
        <div class="col-2 justify-content-end d-flex">

            <div class="dropdown">
                <a class="btn rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill h4"></i>
                </a>
              
                <ul class="dropdown-menu" style="width: 400px">
                    <div class="container w-100">
                        <div class="row h4 ms-2">
                            Notifications
                        </div>
                        <hr>
                        <div class="row ms-2">
                            <span><img src="{{ asset('images/default.png') }}" style="width: 50px; height: 40px" alt="Avatar" class="post-avatar"> 
                            Somebody liked ur poost ahahk ahha</span>
                        </div>
                        <div class="row ms-2">
                            <span><img src="{{ asset('images/default.png') }}" style="width: 50px; height: 40px" alt="Avatar" class="post-avatar"> 
                            Somebody liked ur poost ahahk ahha</span>
                        </div>
                        <div class="row ms-2">
                            <span><img src="{{ asset('images/default.png') }}" style="width: 50px; height: 40px" alt="Avatar" class="post-avatar"> 
                            Somebody liked ur poost ahahk ahha</span>
                        </div>
                    </div>
                </ul>
              </div>

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
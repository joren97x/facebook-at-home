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
                <a class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="h4 bi bi-person-circle"></i>
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
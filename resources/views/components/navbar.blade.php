<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<style>
    #search-result:hover {
        background-color: rgba(0,0,0,0.1)
    }
</style>
<div class="container-fluid bg-body-tertiary border shadow sticky-top">
    @auth
    <div class="row">
        <div class="col-4" style="height: 50px">
            <a href="/"> <img src=" {{ asset('/images/fblogo.png') }} " alt="" style="height: auto; width: 130px; position: absolute; bottom:-10px; object-fill: cover;"> </a>
        </div>
        
        <div class="col-4 justify-content-center d-flex my-2">
            <form action="{{ route('search.page') }}" method="GET" style="margin: 0;">
                @csrf
                <div class="input-group">
                    <span class="input-group-text  rounded-start-pill  border-end-0" style="background-color: rgb(238, 238, 238);">
                        <i class="bi bi-search" style=" color: gray"></i></span>
                            <input type="text" id="search-input" name="search" class="rounded-end-pill border-start-0"
                            placeholder="Search" style="outline: none; box-shadow: none; padding-right: 200px;border: 1px solid rgb(225,229,233); background-color: rgb(238, 238, 238); color: gray">
                </div>
            </form>
        </div>

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
    @endauth
</div>

<div class="container bg-light border rounded" hidden id="search-bar-result" style="position: fixed; margin-left: 34%; width: 420px; z-index: 2;">
    <h1>Search Result</h1>
</div>

<script>
    $(document).ready(function () {
        $('#search-input').on('input', function() {
            if($('#search-input').val() != '') {
                $.ajax({
                    type: 'GET',
                    url: "/search",
                    data: {
                        search_input: $('#search-input').val(),
                    },
                    success: function (data) {
                        $('#search-bar-result').removeAttr('hidden')
                        var result = data.result.users;
                        var container = $('#search-bar-result');
                        container.empty(); // Clear previous results
                        result.forEach(function(user) {
                            var imgSrc = "images/"+ user.profile_pic
                            var row = $('<div class="row fs-6 my-2 rounded" id="search-result"> <a href="/profile/'+ user.id +'"> <img src=" ' + imgSrc + ' " class="post-avatar"> ' + user.firstname + " " + user.lastname + '</a> </div>');
                            container.append(row);
                        });

                        adjustContainerHeight(container); // Adjust container height
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
            $('#search-bar-result').attr('hidden', 'hidden')
        });

        function adjustContainerHeight(container) {
            var rowHeight = 45; // Adjust this value based on your row's height
            var numRows = container.children().length;
            var newHeight = numRows * rowHeight;
            container.height(newHeight);
        }
    });
</script>

    
    
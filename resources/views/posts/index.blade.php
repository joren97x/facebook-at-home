    <div class="row justify-content-center">
        <div class="card shadow my-3" style="width: 35rem;">
            <div class="card-body">
                @if (auth()->user()->profile_pic)
                    <h6 class="card-title"> <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar"> <input type="button" style="padding-right: 220px; background-color: rgb(238, 238, 238);"  data-bs-toggle="modal" data-bs-target="#createPost" class="btn text-start rounded-pill" style="width: 500px" value="What's on your mind, {{ auth()->user()->firstname }}?... "> </h6>
                @else
                    <h6 class="card-title"> <img src="{{ asset('images/default.png') }}" alt="no profile" class="post-avatar"> <input type="button" style="padding-right: 220px; background-color: rgb(238, 238, 238);"  data-bs-toggle="modal" data-bs-target="#createPost" class="btn text-start rounded-pill" style="width: 500px" value="What's on your mind, {{ auth()->user()->firstname }}?... "> </h6>
                @endif
            </div>
        </div>
    </div>

    @foreach ($posts as $post)
    <div class="row justify-content-center">
        <x-post-card :post="$post" />
    </div>
    @endforeach
        <!-- Create Post Modal -->
    <form method="POST" action="/posts/create">
        @csrf
        <div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="fs-5" id="exampleModalLabel">Create Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h6 class="card-title"> 
                        <img src="{{ empty(auth()->user()->profile_pic) ? asset('images/default.png') : asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar"> {{ auth()->user()->firstname . " " . auth()->user()->lastname }} </h6>
                    <textarea name="post-content" class="border-0 mt-3" cols="57" rows="2" placeholder="Write a post..."></textarea>
                    <div class="row">
                        <input type="file" name="post-img" class="form-control">
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary form-control">Post</button>
                </div>
            </div>
            </div>
        </div>
    </form>

    
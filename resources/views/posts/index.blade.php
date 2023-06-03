    <div class="card shadow my-3" style="width: 35rem;">
        <div class="card-body">
            <h6 class="card-title"> <i class="bi bi-person-circle h5"></i> <input type="button" style="padding-right: 260px;" data-bs-toggle="modal" data-bs-target="#createPost" class="btn text-start" style="width: 500px" value="What's on your mind, {{ auth()->user()->firstname }}?... "> </h6>
        </div>
    </div>

    @foreach ($posts as $post)
        <x-post-card :post="$post" />
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
                <h6 class="card-title"> <i class="bi bi-person-circle h5"></i> {{ auth()->user()->firstname . " " . auth()->user()->lastname }} </h6>
                    <textarea name="post-content" class="border-0 mt-3" cols="60" rows="2" placeholder="Write a post..."></textarea>
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

    
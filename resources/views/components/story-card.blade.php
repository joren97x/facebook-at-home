@props(['story'])

<div class="col-3">
    <a href="story/show/{{ $story->id }}">
    <div class="card border card-story rounded shadow" style="width: 155px; height: 240px">
        <img src="{{ asset('images/'.$story->user->profile_pic) }}" class="post-avatar" alt="" style="position: absolute; top:10px; left: 10px; border: 2px solid rgb(22,106,218)">
        <img src="{{ asset('images/'.$story->story_content) }}" class="card-img-top h-100 rounded" alt="...">
        <span style="position: absolute; bottom: 10; left:10; font-size: 14px" class="text-light fw-medium"> {{ $story->user->firstname . ' ' . $story->user->lastname }} </span>
    </div>
    </a>
</div>
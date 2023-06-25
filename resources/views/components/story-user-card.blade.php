@props(['story'])
<div class="row">
    <a href="/story/show/{{ $story->id }}">
        <div class="col my-2">
            <img src="{{ asset('images/'.$story->user->profile_pic) }}" class="post-avatar" style="border: 2px solid blue">
                {{ $story->user->firstname . ' ' . $story->user->lastname }} - {{ $story->created_at->diffForHumans() }}
        </div>
    </a>
</div>
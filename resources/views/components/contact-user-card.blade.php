@props(['user'])

<a href="/profile/{{ $user->id }}"> 
    <div class="row ms-1">
        <div class="col-1">
                <img src="{{ asset('images/'.$user->profile_pic) }}" alt="Avatar" class="post-avatar">
            </div> 
            <div class="col-9 ms-4 mt-1">
                {{ $user->firstname .' '. $user->lastname }} 
            </div> 
    </div>
</a> 

@props(['user'])
<a href="/profile/{{ $user->id }}">
<div class="row ms-1">
    <div class="col-1">
        <a href="/profile/{{ $user->id }}"> 
        <img src="{{ asset('images/'.$user->profile_pic) }}" alt="Avatar" class="post-avatar"></a> 
    </div> 
    <div class="col-9 ms-4 mt-1">
        <a href="/"> {{ $user->firstname .' '. $user->lastname }} </a>
    </div> 
</div>
</a>
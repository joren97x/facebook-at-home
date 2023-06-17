@props(['user'])

<div class="row justify-content-center d-flex" id="user-card">
    <div class="row card my-2 shadow border" style="width: 35rem;">
        <div class="row my-2">
            <div class="col-3">
                <a href="/profile/{{ $user->id }}"> <img src="{{ asset('images/'.$user->profile_pic) }}" alt="Avatar" class="post-avatar" style="width: 80px; height: 80px"> </a>
            </div>
            <div class="col mt-4">
                <a href="profile/{{ $user->id }}"> {{ $user->firstname .' '. $user->lastname }} </a>
            </div>
        </div>
    </div>
</div>
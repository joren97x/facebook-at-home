@props(['story'])
<div class="row rounded m-3 justify-content-center " style="height: 88vh">
    <div class="my-2 " style="width: 22rem; height: 85vh;" >
        {{-- CLASS TO ADD IF ONLY TEXT => add-story-card-2 --}}
        <div class="row " style="position: absolute; top: 90; left: 51%" >
            <div class="col" >
                <a href="/profile/{{ $story->user->id }}">
                    <img src="{{ asset('images/'.$story->user->profile_pic) }}" class="post-avatar" style=" height: 45px; width: 45px">
                    <label class="fw-medium text-light" id="story_owner"> {{ $story->user->firstname . ' ' . $story->user->lastname }} - {{ $story->created_at->diffForHumans() }} </label>
                </a>
            </div>
        </div>
        
        {{-- UNCOMMENT IF ONLY TEXT!!
        <input type="text" id="input_story_content" class="align-self-center bg-transparent border-0" style="margin-top: 80%" placeholder="Start Typing"> --}}

      <img src="{{ asset('images/'.$story->story_content ) }}" class="img-fluid rounded" id="preview_photo" style="height: 85vh;">
    </div>
</div>
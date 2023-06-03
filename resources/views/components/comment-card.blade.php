@props(['comment'])

<div class="row my-2">
  <div class="col-11" >
      {{-- <label class="fw-medium"> <a href="/profile/{{ $comment->commentOwner->id }}"> {{ $comment->commentOwner->firstname . " " . $comment->commentOwner->lastname }} </a> </label>
      <div class="row ms-1">
          {{ $comment->content }} 
      </div> --}}
      <div class="post border-0 row">
          @if(empty($comment->commentOwner->profile_pic))
          <div class="col-1 mb-3"> <img src="{{ asset('images/default.png') }}" alt="Avatar" class="post-avatar"> </div>
          @else
          <div class="col-1 mb-3"> <img src="{{ asset('images/'.$comment->commentOwner->profile_pic) }}" alt="Avatar" class="post-avatar"> </div>
          @endif
          <div class="post-author col-10"> 
              <div class="row fw-medium">
                <div class="col"> <a href="/profile/{{ $comment->commentOwner->id }}"> {{ $comment->commentOwner->firstname . " " . $comment->commentOwner->lastname}} </a> </div> 
              </div>
              <div class="row">
                    <label > {{ $comment->content }} </label>
              </div>  
          </div>
      </div>
  </div>
</div>
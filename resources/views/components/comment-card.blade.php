@props(['comment'])
<div class="row my-2 single-comment">
  <div class="col-11" >
      <div class="post border-0 row ">
            <div class="col-1 mb-3"> <a href="/profile/{{ $comment['commentOwner']['id'] }}"> <img src="{{ asset('images/'.$comment['commentOwner']['profile_pic']) }}" alt="Avatar" class="post-avatar"> </a> </div>
          <div class="post-author col ms-3" style="background-color: rgb(238, 238, 238); border-radius: 15px; display: inline-block;"> 
                <div class="row fw-medium">
                    <div class="col"> 
                        <a href="/profile/{{ $comment['commentOwner']['id'] }}"> {{ $comment['commentOwner']['firstname'] . " " . $comment['commentOwner']['lastname']}} </a> 
                    </div> 
                </div>
                  <label> {{ $comment->content }} </label>
            </div>
                @if($comment->image)
                <img src="{{ asset('images/'.$comment->image) }}" alt="comment image" style="margin-left: 50px; max-width:330px; max-height: 200px; border-radius: 25px">
                @endif
          <div class="row" style="font-size: 13px">
            <div class="col text-start ms-4" >
              <label class="ms-4"> Like</label> <label class="ms-2"> Reply</label> 

              @php
              //e chatgpt mona HAHAHA
                  $commentTime = $comment->created_at;
                  $currentTime = now();
                  $timeDiff = $commentTime->diff($currentTime);

                  if ($timeDiff->d > 0) {
                      $formattedTime = $timeDiff->d . 'd';
                  } elseif ($timeDiff->h > 0) {
                      $formattedTime = $timeDiff->h . 'h';
                  } elseif ($timeDiff->i > 0) {
                      $formattedTime = $timeDiff->i . 'm';
                  } else {
                      $formattedTime = $timeDiff->s . 's';
                  }

              @endphp
                <label class="ms-2">{{ $formattedTime }}</label> 
            </div>
            
          </div>
      </div>
  </div>
</div>
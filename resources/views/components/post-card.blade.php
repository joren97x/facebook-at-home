@props(['post'])
<style>
    .post {
    display: flex;
    align-items: center;
  }

  .post-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 10px;
  }
</style>
<div class="card my-3 shadow" style="width: 35rem;">
    <div class="card-body "> 
        {{-- POST OWNER AND DATE AND POST BODY --}}
        <div class="post">
            @if( empty($post->user->profile_pic) )
                <img src="images/default.png" alt="Avatar" class="post-avatar">
            @else
                <img src="{{ asset('images/'.$post->user->profile_pic) }}" alt="Avatar" class="post-avatar">
            @endif
            <div class="post-author fw-medium "> <a href="/profile/{{ $post->user->id }}"> {{ $post->user->firstname . ' ' . $post->user->lastname }} </a> • <span class="fw-light" style="font-size: 14px"> {{ $post->created_at->diffForHumans() }} </span>  </div>
          </div>
        <label class="card-text mt-1 ms-1"> {{ $post['post-content'] }} </label>
    
   

    {{-- CHECKS IF A POST HAS AN IMAGE --}}
    @if($post['post-img'])
        <img src="{{ asset("images/".$post['post-img']) }}" class="card-img-top" style="height: 400px; object-fit: cover;" alt="...">
    @endif

        {{-- LIKES AND COMMENTS STATISITCS HAHHA --}}
        <div class="row"> 
            <div class="col-6 fw-light">
                <span style="font-size: 15px"> @if($post->likes > 0) {{ $post->likes == 1 ? $post->likes . " like" : $post->likes . " likes" }}  @endif  </span> 
            </div> 
            <div class="col-6 justify-content-end d-flex fw-light"> 
                <span style="font-size: 15px"> @if($post->comments > 0) {{ $post->comments == 1 ? $post->comments . " comment" : $post->comments . " comments" }}  @endif </span> 
            </div>
        </div>

        {{-- LIKE AND COMMENT BUTTONS --}}
    <div class="row text-center border-top border-bottom">
        <div class="col-6">
            <form method="POST" action="/like/{{ $post->id }}" class="mb-0"> 
                @csrf 
                <button class="btn form-control"> 
                    <i class="bi bi-heart"></i> 
                </button> 
            </form>
        </div>
        <div class="col-6">
             <button class="btn form-control" id="commentBtn{{ $post->id }}"> <i class="bi bi-chat-text"></i> </button> 
        </div>
    </div>
    
    {{-- SCRIPT FOR WHEN SUBMITTING A COMMENT --}}
    <script>
        function submitForm(event, contentForm) {
          if (event.keyCode === 13 && !event.shiftKey) {
            event.preventDefault();
            document.getElementById("commentForm"+contentForm).submit();
          }
        }
        document.getElementById('commentBtn'+{{ $post->id }}).addEventListener('click', function() {
            var textarea = document.getElementById('commentTextArea'+{{ $post->id }});
            textarea.focus();
        });
      </script>

      {{-- INPUT COMMMENT BOX --}}
    <div class="row">
            <form method="POST" id="commentForm{{$post->id}}" style="scroll-behavior: smooth;" class="border-0 mt-2" action="/comment/{{ $post->id }}"> 
                @csrf
                <div class="post border-0">
                    <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar">
                    <div class="post-author fw-medium "> <textarea name="content" id="commentTextArea{{ $post->id }}" style="background: whitesmoke;" class="border-0 form-control" id="commentTextArea{{ $post->id }}" placeholder="Write a comment..." cols="65" rows="1" onkeydown="submitForm(event, {{ $post->id }})"></textarea>  </div>
                </div>
            </form> 
    </div>


        {{-- COMMENTS BOX --}}

<div class="container comment-container">
    
       @foreach ($post->comment as $comment)
            <x-comment-card :comment="$comment" />
       @endforeach

</div>
    

    </div>
</div>

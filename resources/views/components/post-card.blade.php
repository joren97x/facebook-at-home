@props(['post'])
<link rel="stylesheet" href="/css/post.css">

<script>
    function deletePost(post_id) {
        $('#delete_post_from_modal').val(post_id)
    }
   
</script>

<div class="card my-2 shadow border" style="width: 35rem;" id="post{{$post->id}}">
    <div class="card-body "> 
        {{-- POST OWNER AND DATE AND POST BODY --}}
        <div class="post"> 
                <a href="/profile/{{ $post->user->id }}"> <img src="{{ asset('images/'.$post->user->profile_pic) }}" alt="Avatar" class="post-avatar" id="post_profile_pic{{ $post->id }}"> </a>
                <div class="post-author fw-medium "> 
                    <a href="/profile/{{ $post->user->id }}" id="post-owner{{ $post->id }}"> {{ $post->user->firstname . ' ' . $post->user->lastname }} </a> • 
                    <span class="fw-light" style="font-size: 14px"> {{ $post->created_at->diffForHumans() }} </span> 
                    <span style="position: absolute; top: 25; right: 30; display: flex; align-items: center;">
                        @if( auth()->user()->id == $post->user->id )
                        <label>
                            <div class="dropstart">
                                <button class="btn" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots" ></i> </button>
                                <ul class="dropdown-menu">
                                  <li><button class="dropdown-item" onclick="editPost('{{$post->id}}', '{{ $post['post-content'] }}', '{{ $post['post-img'] }}')" type="button" data-bs-toggle="modal" data-bs-target="#edit_post_modal">Edit Post</button></li>
                                  <li><button class="dropdown-item" onclick="deletePost({{$post->id}})"  type="button" data-bs-toggle="modal" data-bs-target="#delete_post_modal">Delete Post</button></li>
                                </ul>
                              </div>  
                        </label> 
                        @endif
                      </span>
                </div>
          </div>
        <label class="card-text mt-2 ms-1" id="post_content{{ $post->id }}"> {{ $post['post-content'] }} </label>
    
        @if($post->shared_from)

          <div class="container border rounded">
            {{-- <p> for extrace space from the top because i dont know how to design  --}}
            <p></p>
            <div class="post-author fw-medium "> 
                <a href="/profile/{{ $post->sharedPostOwner->id }}"> <img src="{{ asset('images/'.$post->sharedPostOwner->profile_pic) }}" alt="Avatar" class="post-avatar" id="post_profile_pic{{ $post->sharedPostOwner->id }}"> </a>
                <a href="/profile/{{ $post->sharedPostOwner->id }}" id="post-owner{{ $post->sharedPostOwner->id }}"> {{ $post->sharedPostOwner->firstname . ' ' . $post->sharedPostOwner->lastname }} </a> • 
                <span class="fw-light" style="font-size: 14px"> {{ $post->sharedPost->created_at->diffForHumans() }} </span>  <br>
                <label class="card-text mt-2 ms-1 fw-normal" id="post_content{{ $post->sharedPost->id }}"> {{ $post->sharedPost['post-content'] }} </label>
                <img src="{{ asset('images/'. $post->sharedPost['post-img']) }}" id="post_image{{ $post->id }}" class="w-100" alt="" style="height: 400px; object-fit: cover;">
            </div>
        </div>

        @endif

    {{-- CHECKS IF A POST HAS AN IMAGE --}}
    @if($post['post-img'])
        <img src="{{ asset("images/".$post['post-img']) }}" id="post_image{{ $post->id }}" class="card-img-top mt-2" style="height: 400px; object-fit: cover;" alt="image">
    @endif

        {{-- LIKES AND COMMENTS STATISITCS HAHHA --}}
        <div class="row"> 
            <div class="col-6 fw-light">
                <span style="font-size: 15px" id="likesContainer{{ $post->id }}"> @if($post->likes > 0) {{ $post->likes == 1 ? $post->likes . " like" : $post->likes . " likes" }}  @endif  </span> 
            </div> 
            <div class="col-6 justify-content-end d-flex fw-light"> 
                <a href="#" id="view-comment" class="view-all-comments-focus{{ $post->id }}"><span style="font-size: 15px" id="comment_stats{{ $post->id }}"> @if($post->comments > 0) {{ $post->comments == 1 ? $post->comments . " comment" : $post->comments . " comments" }}  @endif </span> </a>
            </div>
        </div>
        
        {{-- LIKE, COMMENT AND SHARE BUTTONS --}}
    <div class="row text-center border-top border-bottom">
        <div class="col-4">
            @if($post->isLiked)
            <form id="unlikeForm{{ $post->id }}" method="POST" class="mb-0">
                @csrf 
                <button type="submit" class="btn form-control  text-primary"> 
                    <i class="bi bi-hand-thumbs-up-fill fw-bold"></i> <span style="font-size: 14px;" > Like</span>
                </button> 
            </form>
            @else
            <form id="likeForm{{ $post->id }}" method="POST" class="mb-0">
                @csrf 
                <button type="submit" class="btn form-control"> 
                    <i class="bi bi-hand-thumbs-up fw-bold"></i> <span style="font-size: 14px;" > Like</span>
                </button> 
            </form>
            @endif
        </div>
        <div class="col-4">
             <button class="btn form-control" id="commentBtn{{ $post->id }}"> <i class="bi bi-chat-square"></i> <span style="font-size: 14px"> Comment</span> </button> 
        </div>
        <div class="col-4" id="share_post_btn">
            <button class="btn form-control" id="shareBtn{{ $post->id }}" data-bs-toggle="modal" data-bs-target="#sharePost"> <i class="bi bi-share"></i> <span style="font-size: 14px"> Share</span> </button> 
       </div>
    </div>
    
    {{-- KUNG NI LIKE OR UNLIKE --}}
        <script>
            $(document).ready(function() {
                $('#shareBtn{{ $post->id }}').on('click', function() {
                    var share_post_img = $('#post_image{{ $post->id }}').attr('src')
                    var post_id = "{{ $post->id }}"
                    console.log(post_id)
                    if(share_post_img === undefined) {
                        $('#share_post_img').hide()
                    }
                    else {
                        $('#share_post_img').show()
                    } 
                    $('#share_post_id').val(post_id)
                    $('#share_post_img').attr('src', share_post_img)
                    $('#share_full_name').text($('#post-owner{{ $post->id }}').text())
                    $('#share_post_content').text($('#post_content{{ $post->id }}').text())
                    $('#share_post_profile_pic').attr('src', $('#post_profile_pic{{ $post->id }}').attr('src'))
                })

                $('#commentBtn{{ $post->id }}').on('click', function () {
                    $('#commentTextArea{{ $post->id }}').focus()
                })

                $(document).on('submit', '#likeForm{{ $post->id }}', function(e) {
                    e.preventDefault(); // Prevent the form from submitting traditionally
                    var formData = $(this).serialize();
                    var form = $(this);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('post.like', ['post' => $post->id]) }}",
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                var likesContainer = $('#likesContainer{{ $post->id }}');
                                var likesCount = response.likes;
                                var likesText = likesCount == 1 ? likesCount + " like" : likesCount + " likes";
                                likesContainer.text(likesText);
                                form.find('i').attr('class', 'bi bi-hand-thumbs-up-fill fw-bold');
                                form.find('button').removeClass('text-dark');
                                form.find('button').addClass('text-primary');
                                form.attr('id', 'unlikeForm{{ $post->id }}');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });

                $(document).on('submit', '#unlikeForm{{ $post->id }}', function(e) {
                    e.preventDefault(); // Prevent the form from submitting traditionally
                    var formData = $(this).serialize();
                    var form = $(this);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('post.unlike', ['post' => $post->id]) }}",
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                var likesContainer = $('#likesContainer{{ $post->id }}');
                                var likesCount = response.likes;
                                var likesText = ''
                                if(likesCount == 0) {
                                    likesText = ''
                                }
                                else if( likesCount == 1 ) {
                                    likesText = likesCount + " like";
                                }
                                else {
                                    likesText = likesCount + " likes";
                                }
                                likesContainer.text(likesText);
                                form.find('i').attr('class', 'bi bi-hand-thumbs-up fw-bold');
                                form.find('button').removeClass('text-primary');
                                form.find('button').addClass('text-dark');
                                form.attr('id', 'likeForm{{ $post->id }}');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });
            });

        </script>


<div class="container comment-container" >
    @if ($post->comment->first())
        <div class="comment-section" id="comment_container{{ $post->id }}">
            <x-comment-card :comment="$post->comment->first()" />
        </div>
    @endif
    <div class="show-more-comments{{ $post->id }}" style="display: none;" id="comment_container{{ $post->id }}">
        @foreach ($post->comment->skip(1) as $comment)
            <x-comment-card :comment="$comment" />
        @endforeach
    </div>
    @if(count($post->comment) > 1)
    <a href="#" id="view-comment" class="view-all-comments{{ $post->id }}">View all comments</a>
    @endif
</div>


 {{-- INPUT COMMMENT BOX --}}
 <div class="row">
    <form method="POST" id="commentForm{{$post->id}}" style="scroll-behavior: smooth;" class="border-0 mt-2" action="/comment/{{ $post->id }}"> 
        @csrf
        <div class="post border-0">
            <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar">
            <div class="post-author fw-medium "> 
                <div class="d-flex">
                    <textarea name="content" id="commentTextArea{{ $post->id }}" style="background: whitesmoke;" class="border-0 form-control" id="commentTextArea{{ $post->id }}" placeholder="Write a comment..." cols="65" rows="1"></textarea>
                  </div>
            </div>
        </div>
    </form> 
</div>



<script>

    $(document).ready(function() {


        var parentDiv = document.getElementById("comment_container{{ $post->id }}");
        var divCount = parentDiv.getElementsByClassName("single-comment").length;

        $('#commentForm{{ $post->id }}').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var textarea = $(this).find('textarea');
            textarea.val('');
            textarea.blur();

            $.ajax({
                url: "{{ route('post.comment', ['post_id' => $post->id]) }}",
                type: "POST",
                data: formData,
                success: function(response) {

                    var comment = response.comment
                    var commentOwner = response.comment.commentOwner

                    var props= {
                            id: comment.id,
                            user_id: comment.user_id,
                            post_id: comment.post_id,
                            content: comment.content,
                            created_at: comment.created_at,
                            updated_at: comment.updated_at,
                            commentOwner: {
                                id: commentOwner.id,
                                firstname: commentOwner.firstname,
                                lastname: commentOwner.lastname,
                                email: commentOwner.email,
                                bio: commentOwner.bio,
                                profile_pic: commentOwner.profile_pic,
                                email_verified_at: commentOwner.email_verified_at,
                                created_at: commentOwner.created_at,
                                updated_at: commentOwner.updated_at
                            }
                    }
                    if(comment.statistic == 1) {
                        $('#comment_stats{{ $post->id }}').text(comment.statistic+" comment")
                    }
                    else {
                        $('#comment_stats{{ $post->id }}').text(comment.statistic+" comments")
                    }
                    var comContainer = $('.comment-container')

                    var commentTime = new Date(props.created_at);
                    var currentTime = new Date();
                    var timeDiff = Math.floor((currentTime - commentTime) / 1000);

                    var formattedTime;
                    if (timeDiff < 60) {
                    formattedTime = timeDiff + 's';
                    } else if (timeDiff < 3600) {
                    formattedTime = Math.floor(timeDiff / 60) + 'm';
                    } else if (timeDiff < 86400) {
                    formattedTime = Math.floor(timeDiff / 3600) + 'h';
                    } else {
                    formattedTime = Math.floor(timeDiff / 86400) + 'd';
                    }

                    var commentCard = `
    <div class="row my-2">
        <div class="col-11">
        <div class="post border-0 row">
            <div class="col-1 mb-3">
            <a href="/profile/${props.commentOwner.id}">
                <img src="/images/${props.commentOwner.profile_pic}" alt="Avatar" class="post-avatar">
            </a>
            </div>
            <div class="post-author col ms-3" style="background-color: rgb(238, 238, 238); border-radius: 15px; display: inline-block;">
            <div class="row fw-medium">
                <div class="col">
                <a href="/profile/${props.commentOwner.id}">${props.commentOwner.firstname} ${props.commentOwner.lastname}</a>
                </div>
            </div>
            <label>${props.content}</label>
            </div>
            <div class="row" style="font-size: 13px">
            <div class="col text-start ms-4">
                <label class="ms-4">Like</label>
                <label class="ms-2">Reply</label>
                <label class="ms-2">${formattedTime}</label>
            </div>
            </div>
        </div>
        </div>
    </div>`;
                if(divCount == 0) {
                    $('.show-more-comments{{ $post->id }}').append(commentCard);
                    $('.show-more-comments{{ $post->id }}').css("display", "");
                }
                else {

                    // var parent = document.querySelector('.show-more-comments{{ $post->id }}')
                    // var child = parent.getElementsByClassName("single-comment").length;
                    // console.log(child)

                    $('#comment_container{{ $post->id }}').append(commentCard);
                }

                },
                error(error) {
                    console.log(error)
                }
            })

        })
        // IF COMMENTS IN COMMENTBOX AND PRESSES ENTER KEY GO TO FUNCTION ABOVE TO SUBMIT FORM
        $('#commentTextArea{{ $post->id }}').on('keydown', function(e) {
            if(e.keyCode === 13 && !e.shiftKey) {
                $('#commentForm{{ $post->id }}').submit()
            }
        })
    })

</script>

{{-- SCRIPT WHEN CLICGGKING THE VIEW ALL COMMENT  --}}
<script>
    $(document).ready(function() {
        $('.view-all-comments'+{{ $post->id }}).click(function(e) {
            e.preventDefault();
            $('.show-more-comments'+{{ $post->id }}).slideToggle();
            $('.view-all-comments'+{{ $post->id }}).hide();
        });

        // SCRIPT WHEN CLICKING THE COMMENTS TEXT ABOVE THE COMMENT BUTTON 
        $('.view-all-comments-focus'+{{ $post->id }}).click(function(e) {
            e.preventDefault();
            $('.show-more-comments'+{{ $post->id }}).slideToggle();
            $('.view-all-comments'+{{ $post->id }}).hide();
            var textarea = document.getElementById('commentTextArea'+{{ $post->id }});
            textarea.focus();
        });
    });
</script>

    </div>
</div>

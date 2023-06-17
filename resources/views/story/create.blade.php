@extends('layouts.master')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
@section('title', 'Create Story')
@include('components.navbar')
@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-3 bg-light shadow" style="height: 100vh">

                <a href="/"> <button class="btn"> <i class="h2 text-secondary bi bi-x-circle-fill"></i> </button> </a>
                <hr>
                <h2>Your story</h2>
                <span>
                <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="" class="post-avatar" style="height: 65px; width: 65px;">
                <label class="h5"> {{ auth()->user()->firstname . ' ' . auth()->user()->lastname }} </label>
                </span>
                <hr>

                <textarea name="" hidden cols="39" class="rounded" rows="10" id="add_text" placeholder="Start typing"></textarea>
                
                <div class="row ms-4" hidden style="bottom: 0; position: absolute" id="buttons">
                    <div class="col-5">
                        <button class="btn btn-secondary form-control" data-bs-toggle="modal" data-bs-target="#discard_story_modal">Discard</button>
                    </div>
                    <div class="col-7">
                        <form action="/story/create" method="POST">
                            @csrf
                            <input type="hidden" name="story_content" id="story_content">
                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                            <button class="btn btn-primary form-control">Share story</button>
                        </form>
                    </div>
                </div>

            </div>

            

            <div class="col-9" id="make_story">

                <div class="container row justify-content-center" style="margin-top: 180px">

                        <div class="card me-3 add-story-card-1 align-self-center" style="width: 15rem;">
                            <div class="card-body align-self-center">
                                <i class="bi bi-image h2 rounded-pill justify-content-center d-flex"></i>
                                <h6 class="card-title">Create a photo story</h6>
                                <input type="file" id="story_input_file" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;" />
                            </div>
                        </div>
                      
                      <div class="card add-story-card-2 align-self-center" style="width: 15rem;" id="make_story_text">
                        <div class="card-body align-self-center">
                            <i class="bi bi-type h2 rounded-pill justify-content-center d-flex"></i>
                            <h6 class="card-title">Create a text story</h6>
                        </div>
                      </div>

                </div>


            </div>

            {{-- MAKE A PHOTO STORY --}}

            <div class="col-9" id="story_photo" hidden>

                <div class="container bg-light shadow rounded border mt-4" style="height: 80vh">
                    Preview
                    <div class="row bg-dark rounded m-3 justify-content-center" style="height: 70vh">
                        <div class="card my-4" style="width: 15rem; height: 60vh;">
                          <img src="{{ asset('images/me.png' ) }}" class="img-fluid" id="preview_photo" style="height: 60vh; object-fit: fill;">
                        </div>
                    </div>
                </div>

            </div>

            {{-- MAKE A TEXT STORY --}}

            <div class="col-9" id="story_text" hidden>

                <div class="container bg-light shadow rounded border mt-4" style="height: 80vh">
                    Preview
                    <div class="row bg-dark rounded  m-3 justify-content-center" style="height: 70vh">
                        <div class="card my-4 add-story-card-2" style="width: 15rem; height: 60vh;">
                            <input type="text" id="input_story_content" class="align-self-center bg-transparent border-0" style="margin-top: 80%" placeholder="Start Typing">
                        </div>
                    </div>
                </div>

                

            </div>

        </div>

    </div>

    <div class="modal fade" id="discard_story_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Discard Story?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to discard this story? Your story won't be saved.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-dismiss="modal">Continue editing</button>
              <a href="/"> <button type="button" class="btn btn-primary">Discard</button> </a>
            </div>
          </div>
        </div>
      </div>

<script>

    $(document).ready(function() {

        $('#add_text').on('input', function() {
            $('#input_story_content').val($('#add_text').val())
            $('#story_content').val($('#add_text').val())
        })

        $('#make_story_text').on('click', function() {
            $('#make_story').hide()
            $('#buttons').removeAttr('hidden')
            $('#add_text').removeAttr('hidden')
            $('#story_text').removeAttr('hidden')
        })

        $('#story_input_file').on('change', function() {

            var file = $(this).prop('files')[0];
            var baseUrl = "{{ asset('') }}";
            $('#make_story').hide()
            $('#story_photo').removeAttr('hidden')
            $('#preview_photo').attr('src', baseUrl + 'images/' + file.name);
            $('#buttons').removeAttr('hidden')
            $('#story_content').val(file.name)

        })

    })

</script>

@endsection
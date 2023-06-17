@extends('layouts.master')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
@include('components.navbar')
@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-3 bg-light" style="height: 88vh">
                <h5>Stories</h5>
                <br>
                <h6>Your story</h6>
                <br>
                <h6>All stories</h6>
                <div class="row">
                    <div class="col my-2">
                        <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" class="post-avatar" style="border: 2px solid blue">
                        Dummy Firstname
                    </div>
                </div>
                <div class="row">
                    <div class="col my-2">
                        <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" class="post-avatar" style="border: 2px solid blue">
                        Dummy Firstname
                    </div>
                </div>
                <div class="row">
                    <div class="col my-2">
                        <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" class="post-avatar" style="border: 2px solid blue">
                        Dummy Firstname
                    </div>
                </div>
            </div>
    
            <div class="col-9" style="background-color: black">
                
                <div class="row rounded m-3 justify-content-center " style="height: 88vh">
                    <div class="my-2" style="width: 24rem; height: 85vh;" >

                        <div class="row" style="position: absolute; top: 90; right: 37%" >
                            <div class="col">
                                <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" class="post-avatar" style=" height: 45px; width: 45px">
                                <label class="fw-medium text-dark"> Joren Sumagang</label>
                            </div>
                        </div>

                      <img src="{{ asset('images/bruh.png' ) }}" class="img-fluid rounded" id="preview_photo" style="height: 85vh;">
                    </div>
                </div>

            </div>

        </div>

    </div>
    
@endsection
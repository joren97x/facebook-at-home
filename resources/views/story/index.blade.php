@extends('layouts.master')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
@include('components.navbar')
@section('title', 'Facebook at home')
@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-3 bg-light" style="height: 88vh">
                <h5>Stories</h5>
                <br>
                <h6>Your story</h6>

                @php
                    $foundStory = null;
                    foreach($stories as $item) {
                        if(auth()->user()->id == $item->user->id) {
                            $foundStory = $item;
                            break;
                        }
                    } 
                @endphp

                @if($foundStory) 
                    <x-story-user-card :story="$foundStory" />
                @else 

                <div class="row">
                    <a href="/story/create">
                        <div class="col my-2">
                            <div class="row">
                                <div class="col-2">
                                    <i class="h3 bi bi-plus-circle"></i>
                                </div>
                                <div class="col text-start">
                                    Create a story
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                @endif

                <br>
                <h6>All stories</h6>

                @foreach ($stories as $item)
                        
                    @php 
                    if($item->user->id == auth()->user()->id ) {
                        continue;
                    }
                    @endphp

                    <x-story-user-card :story="$item" />
                @endforeach
                
            </div>
    
            <div class="col-9" style="background-color: black">

                <x-view-story-card :story="$story" />

            </div>

        </div>

    </div>
    
@endsection
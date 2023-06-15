@extends('layouts/master')

@section('title', 'Search Results')

@section('content')
@include('components/navbar')
    
    {{-- @foreach ($result->users as $user)
        <h1>BOANG</h1>
    @endforeach --}}

        <div class="container-fluid">
            <div class="row">
                <div class="col-4" id="search-filters" style="background-color: white;">
                    <h2>Search Results</h2>
                    <hr>
                    Filters
                    <div class="row my-2 ms-2 p-2 rounded" id="all-filter">All</div>
                    <div class="row my-2 ms-2 p-2 rounded" id="users-filter">Users</div>
                    <div class="row my-2 ms-2 p-2 rounded" id="posts-filter">Posts</div>
                </div>
                <div class="col-8 ">
                    <div class="container" id="post-container">

                        @foreach($result->posts as $post)

                        <div class="row justify-content-center d-flex" id="post-card">
                            <x-post-card :post="$post" />
                        </div>

                        @endforeach
                    </div>
                    <div class="container" id="user-container">

                        @foreach($result->users as $user)
                            
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

                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        <script>

            $(document).ready(function() {
                $('#users-filter').click( function() {
                    $('#post-container').hide()
                    $('#user-container').show()
                })
                $('#posts-filter').click(function() {
                    $('#user-container').hide()
                    $('#post-container').show()
                })
                $('#all-filter').click(function() {
                    $('#post-container').show()
                    $('#user-container').show()
                })
            })

        </script>

@endsection
@extends('layouts/master')

@section('title', 'Search Results')

@section('content')
@include('components/navbar')
    
    {{-- @foreach ($result->users as $user)
        <h1>BOANG</h1>
    @endforeach --}}

        <div class="container-fluid" >
            <div class="row">
                <div class="col-4" id="search-filters" style="background-color: white;">
                    <h2>Search Results</h2>
                    <hr>
                    <h4>Filters</h4>
                    <div class="row my-2 p-2 rounded fs-5" id="all-filter"> <div class="col"> <i class="bi bi-stickies"></i> All </div></div>
                    <div class="row my-2 p-2 rounded fs-5" id="users-filter"> <div class="col"> <i class="bi bi-people"></i> People </div> </div>
                    <div class="row my-2 p-2 rounded fs-5" id="posts-filter"> <div class="col"> <i class="bi bi-sticky"></i> Posts </div> </div>
                </div>
                <div class="col-8">
                    <div class="container" id="post-container">

                        @foreach($result->posts as $post)

                        <div class="row justify-content-center d-flex" id="post-card">
                            <x-post-card :post="$post" />
                        </div>

                        @endforeach
                    </div>
                    <div class="container" id="user-container">

                        @foreach($result->users as $user)
                            
                            <x-user-card-hover :user="$user" />

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
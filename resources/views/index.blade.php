@extends('layouts.master')
@section('title', 'Facebook at home')

@include('components.navbar')
@section('content')
<style>
    .container .sticky-left .row {
        border-radius: 8px;
        padding: 5px;
    }
    .container .sticky-left .row:hover {
        background-color: rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }
    .container .sticky-left .container a:hover {
        text-decoration: underline;
    }
    .container .sticky-left i {
        font-size: 22px
    }
    .container .sticky-left a {
        font-size: 15px
    }

</style>
<div class=" ms-3 row ">
    <div class="container row col-3 fw-medium mt-4" style="height: 100vh; position: sticky; top: 0; left: 0; overflow-y:hidden;" onmouseover="this.style.overflowY = 'auto';" onmouseout="this.style.overflowY = 'hidden';">
        <div class="col sticky-left" >
            <div class="row ms-1"> 
                <div class="col-1">
                    <i class="bi bi-house"></i>
                </div> 
                <div class="col-2 ms-4">
                    <a href="/"> Home </a>
                </div>  
            </div>
            <div class="row ms-1"> 
                <a href="/profile/{{ auth()->user()->id }}"> 
                <img src="{{ asset('images/'.auth()->user()->profile_pic) }}" alt="Avatar" class="post-avatar"> {{ auth()->user()->firstname . " " . auth()->user()->lastname }}
                </a> 
            </div>
            <hr>
            <div class="row ms-1">
                <div class="col-1">
                    <i class="bi bi-tv"></i>
                </div> 
                <div class="col-2 ms-4">
                    <a href="/"> Watch </a>
                </div> 
            </div>
            <div class="row ms-1">
                <div class="col-1">
                    <i class="bi bi-controller"></i>  
                </div> 
                <div class="col-2 ms-4">
                    <a href="/"> Gaming </a>
                </div> 
            </div>
            <div class="row ms-1">
                <div class="col-1">
                    <i class="bi bi-border-all"></i>
                </div> 
                <div class="col-4 ms-4">
                    <a href="/"> See All </a>
                </div> 
            </div>
            <hr>
            <div class="row ms-1">
                <div class="col-1">
                    <a href="/profile/{{ auth()->user()->id }}"> 
                    <img src="{{ asset('images/ahaahaha.jpg') }}" alt="Avatar" class="post-avatar"></a> 
                </div> 
                <div class="col-9 ms-4 mt-1">
                    <a href="/"> Ambatukam Fan Group </a>
                </div> 
            </div>
            <div class="row ms-1">
                <div class="col-1">
                    <a href="/profile/{{ auth()->user()->id }}"> 
                    <img src="{{ asset('images/it.png') }}" alt="Avatar" class="post-avatar"></a> 
                </div> 
                <div class="col-8 ms-4 mt-1">
                    <a href="/"> BSIT 2022-2023 </a>
                </div> 
            </div>
            <div class="row ms-1">
                <div class="col-1">
                    <a href="/profile/{{ auth()->user()->id }}"> 
                    <img src="{{ asset('images/missu.png') }}" alt="Avatar" class="post-avatar"></a> 
                </div> 
                <div class="col-8 ms-4 mt-1">
                    <a href="/"> I miss you </a>
                </div> 
            </div>
            <div class="row ms-1">
                <div class="col-1">
                    <i class="bi bi-people"></i>  
                </div> 
                <div class="col-8 ms-4">
                    <a href="/"> See all groups </a>
                </div> 
            </div>
            <hr>
            <div class="row ms-1">
                <div class="col-1">
                    <a href="/profile/{{ auth()->user()->id }}"> 
                    <img src="{{ asset('images/dc.png') }}" alt="Avatar" class="post-avatar"></a> 
                </div> 
                <div class="col-8 ms-4 mt-1">
                    <a href="/"> Dragon City </a>
                </div> 
            </div>
            <div class="row ms-1">
                <div class="col-1">
                    <a href="/profile/{{ auth()->user()->id }}"> 
                    <img src="{{ asset('images/prog.png') }}" alt="Avatar" class="post-avatar"></a> 
                </div> 
                <div class="col-8 ms-4 mt-1">
                    <a href="/"> Programming Tips </a>
                </div> 
            </div>
            <div class="row ms-1">
                <div class="col-1">
                    <i class="bi bi-shuffle"></i>
                </div> 
                <div class="col-8 ms-4">
                    <a href="/"> See all shortcuts </a>
                </div> 
            </div>
            <hr>
            <div class="container mt-2 fw-light">
                <a href="/"> Privacy</a>  · 
                <a href="/">Terms</a>  ·
                <a href="/"> Advertising </a>· 
                <a href="/">Ladies Choice</a> ·
                <a href="/">Star Magarine</a>  · 
                <a href="/">Peanut Butter</a>  · 
                <a href="/">Facebook at home © 2023</a>
            </div>
        </div>
    </div>
        
        <div class="container col-6" >
           @include('posts.index')
        </div>
    
        <div class="container row col-3 fw-medium mt-4" style="height: 100vh; position: sticky; top: 0; right: 0; overflow-y:hidden" onmouseover="this.style.overflowY = 'auto';" onmouseout="this.style.overflowY = 'hidden';">

            <div class="col sticky-left">
                <div class="row ms-1"> 
                    <h6>Sponsored</h6>
                </div>
                <div class="row ms-1"> 
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images/nasaktan.jpg') }}" alt="Avatar" class="border rounded w-100">
                        </div>
                        <div class="col-8">
                            <span> Nasaktan Basketball Association  </span>
                        </div>
                    </div> 
                </div>
                <div class="row ms-1"> 
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images/mcqueennasaktan.jpg') }}" alt="Avatar" class="border rounded w-100">
                        </div>
                        <div class="col-8">
                            <span> Lightning mcqueen iniwan quotes </span>
                        </div>
                    </div> 
                </div>
                <div class="row ms-1"> 
                    <h6>Contacts</h6>
                </div>
                <div class="row ms-1">
                    <div class="col-1">
                        <a href="/profile/{{ auth()->user()->id }}"> 
                        <img src="{{ asset('images/ahaahaha.jpg') }}" alt="Avatar" class="post-avatar"></a> 
                    </div> 
                    <div class="col-9 ms-4 mt-1">
                        <a href="/"> Dreamy Bull XXx </a>
                    </div>
                </div>
                @foreach($users as $user) 
                        <x-contact-user-card :user="$user" />
                    @endforeach
            </div>
        </div>
                
</div>
   

@endsection

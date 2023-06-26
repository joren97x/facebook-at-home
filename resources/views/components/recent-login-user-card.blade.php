@props(['ferson'])
<div class="col-3 card mx-2 mt-3" style="background-color: white;">
    <div class="rounded-pill mt-1" style="width: 18px; position: absolute; background-color: rgba(0,0,0,0.8)">
        <i class="bi bi-x text-light"></i>
    </div>
    <img src="{{ asset('images/'.$ferson->user->profile_pic) }}" class="card-img-top" style="height: 169px; object-fit: cover; max-width: 100%;">
    <h5 class="card-title text-center"> {{ $ferson->user->firstname }} </h5>
</div>
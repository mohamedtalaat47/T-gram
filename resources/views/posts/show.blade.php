@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-8">

        <img class="w-100" src="/storage/{{$post->image}}" alt="">

    </div>
    <div class="col-4 ">
        <div class=" d-flex align-items-center pb-2" >
            <div class="">
                <img class="rounded-circle" src="{{$post->user->profile->profileimg()}}" style="width: 60px;" alt="">
            </div>
                <h6><a class="text-black" href="/profile/{{$post->user->id}}"><strong>{{$post->user->username}}</strong></a></h6>
            </div>
            <div>
                <a href="/#">Follow</a>
            </div>

        <hr>
        <div class="pt-2">
        <p><span><a href="/profile/{{$post->user->id}}"><strong class="text-black">{{$post->user->username}}</strong></a></span> {{$post->caption}}</p>
    </div>
    </div>
    </div>
</div>
@endsection

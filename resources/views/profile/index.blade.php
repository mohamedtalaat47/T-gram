@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
    <div class="col-5 d-flex justify-content-center">
        <img class=" rounded-circle " style="height: 200px; width: 200px;" src="{{$user->profile->profileimg()}}" alt="">
    </div> 
    <div class="col-7">
        <div>
            <div class="d-flex justify-content-between align-items-baseline">
                
                
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ $user->username }}</div>
    
                        <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                    </div>
                </div>
                
                
                
            @can('update', $user->profile)
            <button class="btn btn-primary"><a href="/p/create" style="color: white    ;">add post</a></button>
            @endcan

        </div>
        @can('update', $user->profile)
        <a href="/profile/{{$user->id}}/edit" >Edit profile</a>
        @endcan
        

        </div>
        <div class=" d-flex">
            <div style="padding-right: 10px;"><strong> {{$user->post->count()}}</strong> Posts </div>
            <div style="padding-right: 10px;"><strong> {{$user->profile->followers->count()}}</strong> Followers </div>
            <div style="padding-right: 10px;"><strong> {{$user->following->count()}}</strong> Following </div>
        </div>
        <div class="pt-4 font-weight-bold"><strong>{{$user->profile->title}}</strong></div>
        <div>{{$user->profile->description}}
        </div>
        <a href="#">{{$user->profile->url}}</a>
    </div>

    <div class="row mt-5">
        @foreach ($user->post as $post)
        
            <div class="col-4 pt-5"><a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"> </a></div>

        @endforeach
        
    </div>
    </div>
</div>
@endsection

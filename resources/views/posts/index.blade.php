@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100">
                    </a>
                </div>
            </div>
            <div class="row pt-2 pb-4">
                <div class="col-6 offset-3">
                    <div>
                        <p>
                            <span class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                            </span> {{ $post->caption }}
                        </p>
                    </div>
                </div>
        @endforeach

        @empty($posts->count())
            <div class="">
                <h3 class="text-center text-muted py-5">Follow your friends to see their posts</h3>
            </div>

            <div class="card m-auto" style="width: 18rem;">
                <div class="card-header">
                    people to follow
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($suggested as $profile)
                    <li class="list-group-item"> <a href="/profile/{{ $profile->id }}">{{$profile->name}}</a> </li> 
                    @endforeach
                    
                </ul>
            </div>
        @endempty

            
        </div>
    </div>
    </div>

    
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

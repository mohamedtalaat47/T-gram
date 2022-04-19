@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/p/{{$post->id}}">
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
    </div>

@endforeach

    @empty($posts->count)
            <div class=""><h3 class="text-center text-muted py-5">Follow your friends to see their posts</h3></div>
    @endempty

</div>
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection

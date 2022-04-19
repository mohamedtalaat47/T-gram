@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-8 offset-2">
        <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Title</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?? $user->profile->title}}"  autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Description</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description') ?? $user->profile->description}}"  autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">URL</label>

                <div class="col-md-6">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{old('url') ?? $user->profile->url}}"  autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Profile picture</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{old('image') ?? $user->profile->profileimg()}}"  autofocus>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    </div>
                    <div class=" text-center mt-5">
                    <button class="btn btn-primary">Save profile</button>
                    </div>
            </div>  

        </form>
    </div>
</div>
@endsection

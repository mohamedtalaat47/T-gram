@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-8 offset-2">
        <form method="POST" action="/p" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Post caption</label>

                <div class="col-md-6">
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value=""  autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Post image</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value=""  autofocus>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    </div>
                    <div class=" text-center mt-5">
                    <button class="btn btn-primary">Add post</button>
                    </div>
            </div>

        </form>
    </div>
</div>
@endsection

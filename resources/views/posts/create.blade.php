@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <h1 class="offset-md-4 my-3 text-3xl">Add New Post</h1>
        <div class="flex ">
            <label for="caption" class="col-md-4 text-md-right">Post Caption</label>

            <div>
                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" placeholder="Type Something" required autocomplete="caption" autofocus>

                @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="flex my-3">
            <label for="image" class="col-md-4 col-form-label text-md-right"> Post Image</label>
            <div><input type="file" id="image" name="image">
                @error('image')
                
                    <strong>{{ $message }}</strong>
                
                @enderror
            </div>
        </div>
        <div class="offset-md-4">
            <button class="btn btn-primary">Add New Post</button>
        </div>
    </form>
</div>
@endsection
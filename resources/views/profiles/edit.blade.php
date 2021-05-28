@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <h1 class="offset-md-4 my-3 text-3xl">Edit Profile</h1>
        <div class="flex my-2 ">
            <label for="title" class="col-md-4 text-md-right">Title</label>

            <div>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" placeholder="Type Something" required autocomplete="title" autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="flex  my-2 ">
            <label for="description" class="col-md-4 text-md-right">Description</label>

            <div>
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" placeholder="Type Something" required autocomplete="description" autofocus>

                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="flex my-2 ">
            <label for="url" class="col-md-4 text-md-right">Url</label>

            <div>
                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" placeholder="Type Something"  autocomplete="url" autofocus>

                @error('url')
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
            <button class="btn btn-primary">Save Profile</button>
        </div>
    </form>
</div>
@endsection
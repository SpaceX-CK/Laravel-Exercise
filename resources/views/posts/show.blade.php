@extends('layouts.app')

@section('content')
<div class="container self-center  max-w-4xl">
    <div class="flex flex-wrap bg-gray-100 p-1 mt-5">
        <div class="w-full md:w-1/2">
            <img src="/storage/{{$post->image}}" alt="">
        </div>
        <div class="w-full md:w-1/2  p-4 border-l-0 md:border-l-2 border-gray-300">
            <div class="flex flex-wrap">
                <div class="">
                    <img src="{{$post->user->profile->profileImage()}}" class="rounded-full h-10 w-10 border-2 border-black">
                </div>
                <div class="mx-3">
                    <a href="/profile/{{$post->user->id}}">
                        <h3 class="text-2xl"><strong>{{$post->user->username}}</strong></h3>
                    </a>
                </div>
                <div class="my-auto"><a href="#" class="my-2">Follow</a></div>
            </div>
            <p class="my-4">
                <a href="/profile/{{$post->user->id}}">
                    <span><strong>{{$post->user->username}}</strong></span>
                </a>{{$post->caption}}
            </p>
        </div>
    </div>

</div>
@endsection
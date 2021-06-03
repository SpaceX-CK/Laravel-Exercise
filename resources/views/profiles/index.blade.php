@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
    <div class="grid grid-cols-3 gap-4 justify-center">
        <div class="mx-auto">
            <img src="https://www.w3schools.com/w3images/avatar2.png" class="w-40 rounded-full">
        </div>
        <div class="col-span-2">
            <div class="flex justify-between ">
                <h1 class="text-4xl">{{ $user->username }}</h1>

                <a href="/p/create"> Add New Post</a>
            </div>
            <div class="my-2 flex flex-row">
                <div class="mr-10">
                    <strong>{{$user->posts->count()}}</strong> posts
                </div>
                <div class="mx-10">
                    <strong>99</strong> followers
                </div>
                <div class="mx-10">
                    <strong>99</strong> following
                </div>
            </div>
            <div class="font-bold my-1">{{$user->profile->title}}</div>
            <div>
                {{$user->profile->description}}
            </div>
            <div>
                <a class=" font-bold" href="">{{ $user->profile->url ??'N/A' }}</a>
            </div>


        </div>
    </div>
    <div class="grid grid-cols-3 gap-8 justify-items-center my-3 place-items-center">
        @foreach($user->posts as $post)
        <div class="border-black border-2">
            <img src="/storage/{{ $post->image }}" class="w-100 ">
        </div>
        @endforeach
    </div>
</div>
@endsection
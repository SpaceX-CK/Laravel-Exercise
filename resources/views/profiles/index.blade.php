@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="grid grid-cols-3 gap-4 justify-center">
        <div class="mx-auto  md:my-auto my-2">
            <img src="{{$user->profile->profileImage()}}" class="w-56 h-56 rounded-full border-4 border-black">
        </div>
        <div class="col-span-2 mr-4">
            <div class="flex flex-wrap mb-2">
                <h1 class="text-4xl mb-1 mr-2">{{ $user->username }}</h1>

                <div class=" my-auto">
                   <follow-button user-id="{{$user->id}}" follows="$follows"></follow-button>

                </div>
            </div>

            <div class="flex justify-between">
                @can('update',$user->profile)
                <a href="/profile/{{ $user->id }}/edit"> Edit Profile</a>
                @endcan

                @can('update',$user->profile)
                <a href="/p/create"> Add New Post</a>
                @endcan
            </div>
            <div class="my-2 flex flex-row">
                <div class="">
                    <strong>{{$postCount}}</strong> posts
                </div>
                <div class="md:mx-10 mx-2">
                    <strong>{{$followerCount}}</strong> followers
                </div>
                <div class="">
                    <strong>{{$followingCount}}</strong> following
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
    <div class="grid grid-cols-3 gap-8 justify-items-center my-3 place-items-center mx-4">
        @foreach($user->posts as $post)
        <div class="border-black border-2">
            <a href="/p/{{ $post->id}}">
                <img src="/storage/{{ $post->image }}" class="w-100 ">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
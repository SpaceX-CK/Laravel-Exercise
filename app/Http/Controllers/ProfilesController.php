<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    //
    public function index(User $user)
    {
        //determine is that auth-user follow this profile 
        //if user auth ?then take the auth following isit cointain user : else turn false means not following 
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        // dd(User::find($user));
        // $user = User::findOrFail($user);
        // return view('profiles.index', ['user' => $user]);

        // $postCount = $user->posts->count();
        //           import                key                  time to load                   giving access to $user for return
        $postCount = Cache::remember('count.posts' . $user->id, now()->addSecond(20), function () use ($user) {
            return $user->posts->count();
        });

        // $followerCount = $user->profile->follower->count();
        $followerCount = Cache::remember('count.follower' . $user->id, now()->addSecond(20), function () use ($user) {
            return $user->profile->follower->count();
        });

        // $followingCount = $user->following->count();
        $followingCount = Cache::remember('count.following' . $user->id, now()->addSecond(20), function () use ($user) {
            return $user->profile->follower->count();
        });

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followerCount', 'followingCount'));
    }

    public function edit(\App\Models\User $user)
    {
        //require auth to update
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' =>  $imagePath];
        }

        //$user->profile->update($data);
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []

        ));

        return redirect("/profile/{$user->id}");
        // dd($data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\User;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    //
    public function index($user)
    {
        // dd(User::find($user));
        $user = User::findOrFail($user);
        return view('profiles.index',['user'=>$user]);
    }

    public function edit(\App\Models\User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit',compact('user'));

    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',
        ]);
        
      

        if (request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
    
        }

        //$user->profile->update($data);
		auth()->user()->profile->update(array_merge(
            $data,
            ['image' =>  $imagePath]
        ));

        return redirect("/profile/{$user->id}");
        // dd($data);

    }
}

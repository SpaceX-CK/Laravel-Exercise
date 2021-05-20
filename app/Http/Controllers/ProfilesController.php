<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\User;

class ProfilesController extends Controller
{
    //
    public function index($user)
    {
        // dd(User::find($user));
        $user = User::findOrFail($user);
        return view('profiles.index',['user'=>$user]);
    }
}

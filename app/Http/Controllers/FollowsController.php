<?php

namespace App\Http\Controllers;
// use App\Models\User;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function __construct()
    {   //log in to follow
        $this->middleware('auth');       
    }
    public function store(\App\Models\User $user)
    {
        return auth()->user()->following()->toggle($user->profile);
        //the auth user fetch following relationship  call toggle method with the (target user profile not the auth user  so not have 'profile()') 
    }
}

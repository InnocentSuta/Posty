<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Userpostcontroller extends Controller
{
    public function index(User $user)
    {
        // dd($user);
        $posts = $user->posts()->with(['user','likes'])->paginate(10);
        
        return view('users.posts.index',[ 'user' => $user, 'posts'=> $posts,]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Userpostcontroller extends Controller
{
    public function index(User $user)
    {
        dd($user);
        // return view()
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(Post $post, Request $request){

        if ($post->likedBy($request->user())){

            return response(null, 409);

        }
        else
        {

        $post->likes()->create([

            'user_id'=>Auth::user()->id,

        ]);
    }
        return back();
    }

    public function destroy(Post $post, Request $request){

        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}

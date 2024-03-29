<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post){

        //validation
        request()->validate([
            'body'=>'required'
        ]);

        $post->comment()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body'),
        ]);

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){

        return view('posts.index', [
            'posts' => Post::latest()
            ->filter(request(['search', 'category', 'author']))
            ->paginate(6),
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]); 
    }
}

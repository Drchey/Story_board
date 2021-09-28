<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('is_active', true)->with('tags')->latest()->get();

        return $posts;
        return view('posts.index', compact('posts'));


    }

}

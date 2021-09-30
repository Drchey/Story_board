<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $posts = Post::where('is_active', true)->with('tags')->latest()->get();

        $tags = Tag::orderBy('name')->get();

        if ($request->has('s')) {
            $query= strtolower($request->get('s'));
            $posts = $posts->filter(function ($post) use ($query){
                if(Str::contains(strtolower($post->title), $query)){
                    return true;
                }
                if(Str::contains(strtolower($post->content), $query)){
                    return true;
                }

                return false;
            });
            }
            if($request->has('tag')){
                $tag = $request->get('tag');
                $posts = $posts->filter(function ($post) use ($tag){
                    return $post->tags->contains('slug', $tag);
                    });
        }

        return view('posts.index', get_defined_vars());



    }

    public function show(Post $post, Request $request)
    {
        return view('posts.show', compact('post'));
    //   return  $post;
    }

}

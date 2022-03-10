<?php

namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;


class DeleteController extends Controller
{
    public function __invoke(Post $post){

        $post->delete();
        $posts = Post::all();

        //   return view('post.index', compact('posts') );
        return redirect()->route('post.index');
    }

}

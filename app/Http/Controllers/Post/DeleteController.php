<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Models\PostTag;


class DeleteController extends BaseController
{
    public function __invoke(Post $post){

        $post->delete();
        $posts = Post::all();

        //   return view('post.index', compact('posts') );
        return redirect()->route('post.index');
    }

}

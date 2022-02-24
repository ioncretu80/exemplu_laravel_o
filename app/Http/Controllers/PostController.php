<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $post = Post::where('is_publisched',1)->first();
        dump($post->title);
        dd($post);
        return "posts.index";
    }
}

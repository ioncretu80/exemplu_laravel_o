<?php

namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;


class IndexController extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        $posts = Post::all();
        return view("post.index", compact('posts'));
    }


//    public function index()
//    {
//
//
////        $category = Category::find(1);
////        dd($category->posts);
////        $post = Post::find(1);
////        dd($post->tags->count());
//
////        $tag = Tag::find(3);
////        dd($tag->posts);
//
////        $posts = Post::where('category_id', $category->id)->get();
////
////
////
////        dd($posts);
//        $posts = Post::all();
//        $category = Category::find(2);
//        $tag = Tag::find(3);
//
//        return view("post.index", compact('posts'));
//    }


}

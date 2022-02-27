<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
//        $category = Category::find(1);
//        dd($category->posts);
        $post = Post::find(1);
        dd($post->category->id);

        $posts = Post::where('category_id', $category->id)->get();



        dd($posts);
        return view("post.index", compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {

        $data = request()->validate(
            ['title'=>'string',
            'content'=>'string',
            'image'=>'string'
            ]
        );
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }
    public function edit(Post $post){

        return view('post.edit', compact('post'));
    }
    public function update(Post $post)
    {
        $data = request()->validate(
            ['title'=>'string',
                'content'=>'string',
                'image'=>'string'
            ]
        );

        $post->update($data);
       // return view('post.show', (array) $post->id);
        return redirect()->route('post.show', $post->id);
    }

    public function delete(Post $post){

        $post->delete();
        $posts = Post::all();

     //   return view('post.index', compact('posts') );
        return redirect()->route('post.index');
    }

    public function firstOrCreate(){


        $anotherPost = [
                "title"=>"upd1",
                "content"=>"upd1",
                "image"=>"upd1",
                "likes"=>50,
                "is_publisched"=>1,
        ];

        $post = Post::firstOrCreate([
            "title"=>"upd1",
        ],$anotherPost);

        dump($post->content);
        dd("firstOrCreate");
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;


class PostController extends Controller
{
    public function index()
    {


//        $category = Category::find(1);
//        dd($category->posts);
//        $post = Post::find(1);
//        dd($post->tags->count());

//        $tag = Tag::find(3);
//        dd($tag->posts);

//        $posts = Post::where('category_id', $category->id)->get();
//
//
//
//        dd($posts);
        $post = Post::find(3);
        $category = Category::find(2);
        $tag = Tag::find(3);
        dd($post->tags);
        return view("post.index", compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {

        $data = request()->validate(
            ['title'=>'required|string',
            'content'=>'string',
            'image'=>'string',
                'category_id'=>'',
                'tags'=>'',
            ]

        );
;
            $tags = $data['tags'];
            unset($data['tags']);



        $post = Post::create($data);
//       prima metoda
//        foreach ($tags as $tag){
//            PostTag::firstOrcreate(
//                [
//                    "tag_id"=>$tag,
//                    "post_id"=>$post->id]
//            );
//        }
//metoda 2
       $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post){

        return view('post.show', compact('post'));
    }
    public function edit(Post $post){

        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories','tags'));
    }
    public function update(Post $post)
    {
        $data = request()->validate(
            ['title'=>'string',
                'content'=>'string',
                'image'=>'string',
                'category_id'=>'',
                'tags'=>'',
            ]

        );

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
     //   $post = $post->fresh();
        $post->tags()->sync($tags);
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

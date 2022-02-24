<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::where('is_publisched', 1)->first();

        dd("post.index");
        return "posts.index";
    }

    public function create()
    {
        $postArr = [
            [
                "title"=>"titlu_nou_updated",
                "content"=>"content_nou_updated",
                "image"=>"image_nou_updated",
                "likes"=>50,
                "is_publisched"=>1,
            ],
            [
                "title"=>"titlu_nou_updated2",
                "content"=>"content_nou_updated2",
                "image"=>"image_nou_updated2",
                "likes"=>50,
                "is_publisched"=>1,
            ]
        ];

        foreach ($postArr as $item){

            Post::create($item);
        }
        dd("created");
    }

    public function update()
    {

        $post = Post::find(5);
        $post->update([
            "title"=>"upd",
            "content"=>"upd",
            "image"=>"upd",
            "likes"=>50,
            "is_publisched"=>1,
        ]);

        dd("updated");
    }

    public function delete(){
        $post = Post::find(1);
        $post->delete();
        dd("deleted");
    }
}

<?php

namespace App\Http\Controllers\Post;



use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;



class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {

        // TODO: Implement __invoke() method.
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate(10);
//        $query = Post::query();
//        if (isset($data['category_id'])){
//            $query->where('category_id', $data['category_id']);
//        }
//
//        if (isset($data['title'])){
//            $query->where('title','like', "%{$data['title']}%");
//        }
//        if (isset($data['content'])){
//            $query->where('content','like', "%{$data['content']}%");
//        }
//        $posts = $query->get();
//        dd($posts);
//        $posts = Post::paginate(10);
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

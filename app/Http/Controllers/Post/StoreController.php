<?php

namespace App\Http\Controllers\Post;


use App\Http\Requests\Post\StoreRequest;
use App\Models\PostTag;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated(); //HTTP
        $this->service->store($data);

//        $tags = $data['tags'];   //Model
//        unset($data['tags']);
//        $post = Post::create($data);
//        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }


//


}

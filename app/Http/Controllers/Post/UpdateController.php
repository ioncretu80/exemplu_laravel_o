<?php

namespace App\Http\Controllers\Post;


use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Models\PostTag;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($data, $post);

//        $tags = $data['tags'];
//        unset($data['tags']);
//
//        $post->update($data);
//     //   $post = $post->fresh();
//        $post->tags()->sync($tags);
//       // return view('post.show', (array) $post->id);
        return redirect()->route('post.show', $post->id);
   }



}

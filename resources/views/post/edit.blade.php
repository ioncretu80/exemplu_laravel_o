@extends('layouts.main')
@section('content')
<div>
    <div >
        Creaza o Postare
    </div>
    <form action="{{route('post.update',$post->id )}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3 w-50">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{$post->title}}">

        </div>
        <div class="mb-3 w-50">
            <label for="conten" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="Content">{{$post->content}}</textarea>

        </div>


        <div class="mb-3 w-50">
            <label for="title" class="form-label">Image</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="Image" value="{{$post->image}}">

        </div>
        <div class="mb-3 w-50">
            <label for="category">Category</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected':''}} >{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 w-50">
            <label for="category">Tags</label>
            <select class="form-select" multiple aria-label="multiple select example" id="tags" name="tags[]">
                @foreach($tags as $tag)

                    <option
                        @foreach($post->tags as $postTag)
                        {{$tag->id ==$postTag->id ? "selected" : ""}}
                        @endforeach
                        value="{{$tag->id}}" >{{$tag->title}}</option>
                @endforeach
            </select>
        </div>

        <div>
        <button type="submit" class="btn btn-primary">Update</button>

        </div>
    </form>

</div>
@endsection

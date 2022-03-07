@extends('layouts.main')
@section('content')
<div>
    <div >
        Creaza o Postare
    </div>
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="mb-3 w-50">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{old('title')}}">
            @error("title")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="Content">{{old('content')}}</textarea>
            @error("content")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3 w-50">
            <label for="title" class="form-label">Image</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="Image" value="{{old('image')}}">
            @error("image")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="category">Category</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                @foreach($categories as $category)
                <option
                    {{old('category_id')==$category->id ? 'selected' : ''}}
                    value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 w-50">
            <label for="category">Tags</label>
            <select class="form-select" multiple aria-label="multiple select example" id="tags" name="tags[]">
                @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>


        <div>
        <button type="submit" class="btn btn-primary">Create</button>

        </div>
    </form>

</div>
@endsection

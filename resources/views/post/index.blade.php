@extends('layouts.main')
@section('content')
<div>

    <div class="mb-3">
        <a class="btn btn-primary" href="{{route('post.create')}}">Add Post</a>
    </div>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Cotent</th>
            <th scope="col">Image</th>
            <th scope="col">Likes</th>
            <th scope="col">Published</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row"><a href="{{route('post.show', $post->id)}}">{{$post->id}}</a></th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->image}}</td>
            <td>{{$post->likes}}</td>
            <td style="text-align: center">{{$post->is_published}}</td>

        </tr>
        @endforeach

    </table>

    <div class="mt-10">
        {{$posts->withQueryString()->links()}}
    </div>
    </tbody>
</div>
@endsection

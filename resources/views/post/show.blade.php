@extends('layouts.main')
@section('content')
<div>


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

        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->image}}</td>
            <td>{{$post->likes}}</td>
            <td>{{$post->is_publisched}}</td>

        </tr>

        </tbody>
    </table>
    <div>

        <a href="{{route('post.edit',$post->id)}}">Edit</a>
    </div>
    <div>
        <form action="{{route('post.delete',$post->id)}}" method="POST">
            @csrf
            @method('delete')

            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
    <div>
        <a href="{{route('post.index')}}">Back</a>
    </div>

</div>
@endsection

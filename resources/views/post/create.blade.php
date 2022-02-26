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
            <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="">

        </div>
        <div class="mb-3 w-50">
            <label for="conten" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="Content"></textarea>

        </div>

        <div class="mb-3 w-50">
            <label for="title" class="form-label">Image</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="Image" value="">

        </div>
        <div>
        <button type="submit" class="btn btn-primary">Create</button>

        </div>
    </form>

</div>
@endsection

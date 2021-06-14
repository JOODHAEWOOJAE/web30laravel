@extends('layout')

@section('title', 'Добавить пост')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Редактировать пост № {{$post->id}}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <!-- Blog Post -->
        @if(Auth::check())
            <hr>
            <form action="edit_post" method="post" enctype="multipart/form-data">
                @csrf
                <p>Выберите автора:</p>
                <select class="mbd-select md-form" name="author_id">
                    @foreach($authors as $author)
                        <option @if($author->id == $post->author_id) selected @endif value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
                <hr>
                <p>Выберите категорию:</p>

                @foreach($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" name="category_id[]" type="checkbox" value="{{$category->id}}">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$category->title}}
                        </label>
                    </div>
                @endforeach
                <hr>
                <hr>
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="text" placeholder="New Title" name="title" value="{{$post->title}}"><br><br>
                <textarea class="form-control" name="body">{{$post->body}}</textarea><hr>
                <input type="file" name="image"><br><br>
                <button class="btn-save btn btn-primary btn-cm">Обновить пост</button>
            </form>
        @endif
    </div>
@endsection

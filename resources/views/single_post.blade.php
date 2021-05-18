@extends('layout')

@section('title', 'Пост')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">{{$post->title}}</h1>

        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{$post->body}}</p>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{$post->updated_at}} by
                    <a href="{{route('post_by_author', $post->author->key)}}">{{$post->author->name}}</a>
                </div>
            </div>
    </div>
@endsection

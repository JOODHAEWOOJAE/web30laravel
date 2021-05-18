@extends('layout')

@section('title', $author->name)

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Все посты автора
            <small style="color: greenyellow">{{$author->name}}</small>
        </h1>

    @foreach($author->posts as $post)
        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{mb_substr($post->body, 0, 200)}} ...</p>
                    <a href="{{route('single_post', $post->id)}}" class="btn btn-primary">Читать далее &rarr;</a>
                </div>
            </div>
    @endforeach

    <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>
@endsection

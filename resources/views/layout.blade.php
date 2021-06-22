<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('Index')}}">Sinyakov</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('Index')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('services')}}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contacts')}}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart')}}">Корзина</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin_post_get')}}">Администрирование</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">@if(\Illuminate\Support\Facades\Auth::check()){{\Illuminate\Support\Facades\Auth::user()->name}}
                        @else Вход @endif</a>

                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        @yield('content')

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Курсы валют</h5>
                <div class="card-body">
                    <ul class="list-group-item-action">
                        @inject('currency', '\App\Currency')
                        {{$currency->get_currency()}}
                    </ul>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Категории</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @inject('categories', '\App\Category')
                                @foreach($categories->show_categories() as $category)
                                <li>
                                    <a href="{{route('post_by_category', $category->key)}}">{{$category->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card my-4">
                @inject('authors', '\App\Author')
                <h5 class="card-header">Лучшие авторы из {{$authors->show_count()}}</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @foreach($authors->show_authors() as $author)
                                    <li>
                                        <a href="{{route('post_by_author', $author->key)}}">{{$author->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Наши соц. сети</h5>
                <div class="card-body">
                    @inject('socials', '\App\Social')
                    <ul class="list-unstyled mb-0">
                    @foreach($socials->show_socials() as $social)
                       <li>
                           <img style="width: 25px; height: 25px" src="{{$social->icon_link}}">
                           <a style="font-size:18px" href="{{$social->link}}">{{$social->title}}</a>
                       </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Советуем почитать</h5>
                <div class="card-body">
                    @inject('posts', '\App\Post')
                    @foreach($posts->getRandomPost() as $post)
                        <a href="{{route('single_post', $post->id)}}">{{$post->title}}</a>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Best Website 2021</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

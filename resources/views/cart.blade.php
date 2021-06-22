@extends('layout')

@section('title', 'Корзина')

@section('content')
    <div class="col-md-8">
        @if(\Session::has('flash'))
            <p>{{\Session::get('flash')}}</p>
    @endif

    <!-- Blog Post -->
        <div class="card mb-4">
            <form id="checkout" method="post" action="{{route('update_cart')}}">
                @csrf
            <table border="1">
                <p>Корзина</p>
                <tr>
                    <th>ИД</th>
                    <th>Превью</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итого</th>
                    <th>Удалить</th>
                </tr>
                @if(!Cart::isEmpty())
                    @foreach(\Cart::getContent() as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>
                        <img src="{{$post->attributes->image}}" width="75" height="40">
                    </td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->price}}</td>
                    <td>
                        <input type="number" name="items [{{$post->id}}]"
                        value="{{$post->quantity}}">
                    </td>
                    <td>{{$post->getPriceSum()}}</td>
                    <td>
                        <a href="{{route('delete_from_cart', $post->id)}}" class="btn btn-primary">Delete</a>
                    </td>
                </tr>
                    @endforeach
                @endif
            </table>
                <a href="#" class="btn btn-primary"
                    onclick="document.getElementById('checkout').submit()">Обновить корзину</a>
            </form>
        </div>
    </div>

@endsection

@extends('layout')

@section('title', 'Корзина')

@section('content')
    <div class="col-md-8">
        @if(\Session::has('flash'))
            <p>{{\Session::get('flash')}}</p>
    @endif

    <!-- Blog Post -->
        <div class="card mb-4">
            @if(!Cart::isEmpty())
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
                    <tr>
                        <td colspan="4" style="text-align: right">Итого: </td>
                        <td style="background-color:silver; font-weight: bold">
                            {{\Cart::getTotalQuantity()}}
                        </td>
                        <td style="background-color:gold; font-weight: bold">{{\Cart::getTotal()}}</td>
                        <td>
                        </td>
                    </tr>
            </table>
                <div style="text-align: right">
                    <a href="#" class="btn btn-primary"
                       onclick="document.getElementById('checkout').submit()">Обновить корзину</a>
                </div>
            </form>
            <br>
            <a href="{{route('checkout')}}" class="btn btn-primary">Перейти к оформлению заказа</a>
            @else
                <h2>Ваша коризна пуста</h2>
            @endif
        </div>
    </div>

@endsection

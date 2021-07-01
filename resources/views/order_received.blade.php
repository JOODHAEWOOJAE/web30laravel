@extends('layout')

@section('title', 'Заказ оформлен')

@section('content')
    <div class="col-md-8">
        <!-- Blog Post -->
        <div class="card mb-4">
                <h3>Ваш заказ:</h3>
                <table border="1">
                    <tr>
                        <th>Превью</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Итого</th>
                    </tr>
                    @if(!Cart::isEmpty())
                        @foreach(\Cart::getContent() as $post)
                            <tr>
                                <td>
                                    <img src="{{$post->attributes->image}}" width="75" height="40">
                                </td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->price}}</td>
                                <td>
                                    {{$post->quantity}}
                                </td>
                                <td>{{$post->getPriceSum()}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="text-align: right">Итого: </td>
                            <td style="background-color:silver; font-weight: bold">
                                {{\Cart::getTotalQuantity()}}
                            </td>
                            <td style="background-color:gold; font-weight: bold">{{\Cart::getTotal()}}</td>
                        </tr>
                    @endif
                </table>
            <h3>Контактые данные заказчика:</h3>
            <table border="1">
                <tr>
                    <th>ФИО</th>
                    <td>{{$order->first_name}}{{$order->last_name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$order->email}}</td>
                </tr>
                <tr>
                    <th>Телефон</th>
                    <td>{{$order->phone}}</td>
                </tr>
                <tr>
                    <th>Адрес</th>
                    <td>{{$order->address}}</td>
                </tr>
                <tr>
                    <th>Комментарии</th>
                    <td>{{$order->notes}}</td>
                </tr>
            </table>
            <br>
            <button type="button" class="btn btn-success btn-lg block">Оплатить онлайн</button>
        </div>
    </div>

@endsection

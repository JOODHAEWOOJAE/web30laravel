@extends('layout')

@section('title', 'Оформление заказа')

@section('content')
    <div class="col-md-8">
        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <!-- Blog Post -->
        <div class="card mb-4">
            <form id="checkout" method="post" action="{{route('checkout')}}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Имя: </span>
                    </div>
                    <input type="text" name="first_name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Фамилия: </span>
                    </div>
                    <input type="text" name="last_name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Телефон: </span>
                    </div>
                    <input type="tel" name="phone" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Адрес: </span>
                    </div>
                    <input type="text" name="address" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Комментарии:</span>
                    </div>
                    <textarea name="notes" class="form-control" aria-label="With textarea"></textarea>
                </div>
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
                <br>
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Оформить заказ">
            </form>
        </div>
    </div>

@endsection

@extends('layout')

@section('title', 'CONTACTS')

@section('content')

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <h1 class="my-4">OUR CONTACTS</h1>
        <ul>

        @foreach($contacts as $contact)
                <li>{{$contact->name}} : {{$contact->address}}</li>
            @endforeach

        </ul>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2747.066831310967!2d30.725604515792252!3d46.48698907263429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c631965dfc29b9%3A0xcb38625fe2099a1e!2z0JrQvtC80L_RjNGO0YLQtdGA0L3QsNGPINCQ0LrQsNC00LXQvNC40Y8g0KjQkNCT!5e0!3m2!1sru!2sua!4v1622909897332!5m2!1sru!2sua" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

@endsection

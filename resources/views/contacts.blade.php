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
    </div>


@endsection

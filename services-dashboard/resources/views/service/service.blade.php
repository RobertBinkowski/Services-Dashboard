@extends('layouts.app')

@section('content')
    <div class="div-info">
        <h1>service</h1>
    </div>
    <div>
        <h2>{{ $service['name'] }}</h2>
        <ul>
            <li>
                Address: <strong>{{ $service['address'] }}</strong>
            </li>
            <li>
                Score: <strong>{{ $service['rating'] }}/10</strong>
            </li>
            <li>
                Price: <strong>{{ $service['price'] }}</strong>/h
            </li>
        </ul>
        <br>
        @if ($service->users === Auth::user()->id)
            <a href="/service/edit/{{ $service['id'] }}" class="button">Edit</a>
        @else
            <a href="/service/apply/{{ $service['id'] }}" class="button">Apply</a>
        @endif
    </div>
@endsection

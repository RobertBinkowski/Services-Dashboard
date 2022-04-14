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
                Score: <strong>{{ $service['score'] }}</strong>
            </li>
            <li>
                Price: <strong>{{ $service['price'] }}</strong>/h
            </li>
        </ul>
        <br>
        <a href="/application/{{ $service['id'] }}" class="button">Apply</a>
    </div>
@endsection

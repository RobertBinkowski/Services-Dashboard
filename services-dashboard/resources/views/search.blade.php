@extends('layouts.app')

@section('title', 'Search')

@section('content')
    <div class="div-info">
        <h1>Search</h1>
    </div>
    <div id="search">
        <form action="" method="POST">
            <input type="search" name="search" />
            <input type="submit" class="button" value="Search">
        </form>
    </div>
    <div>
        @isset($services)
            @foreach ($services as $service)
                <div class="service">
                    <h2>{{ $services['name'] }}</h2>
                    <ul>
                        <li>
                            Address: <strong>{{ $services['address'] }}</strong>
                        </li>
                        <li>
                            Score: <strong>{{ $services['score'] }}</strong>
                        </li>
                        <li>
                            Price: <strong>{{ $service['price'] }}</strong>/h
                        </li>
                    </ul>
                    <br>
                    @if ($service->users === Auth::user()->id)
                        <a href="/service/edit/{{ $services['id'] }}" class="button">Edit</a>
                    @else
                        <a href="/service/apply/{{ $services['id'] }}" class="button">Apply</a>
                    @endif
                </div>
            @endforeach
        @endisset
    </div>
@endsection

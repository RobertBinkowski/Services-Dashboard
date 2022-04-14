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


        {{-- <div class="service">
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
            <a href="" class="button">Apply</a>
        </div> --}}
    </div>
@endsection

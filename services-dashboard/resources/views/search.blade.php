@extends('layouts.app')

@section('title', 'Search')
@method('POST')
@section('content')
    <div class="div-info">
        <h1>Search</h1>
        @if ($message = Session::get('success'))
            <div class="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
    </div>
    <div id="search">
        <form method="POST" action="{{ url('/search') }}">
            @csrf
            {{-- <label for="search">Search</label> --}}
            <input type="search" name="search" />
            <input type="submit" class="button" value="Search">
        </form>
    </div>
    <div>
        @isset($services)
            @foreach ($services as $service)
                <div class="service">
                    <h2>{{ $service->name }}</h2>
                    <p>
                        Address: <br><strong>{{ $service->address }}</strong><br>
                        Score: <br><strong>{{ $service->score }}</strong><br>
                        Price: <br><strong>{{ $service->price }}</strong>/h <br>
                    </p>
                    <br><br>
                    @if ($service->users === Auth::user()->id)
                        <a href="/service/edit/{{ $service->id }}" class="button">Edit</a>
                    @else
                        <a href="/service/apply/{{ $service->id }}" class="button">Apply</a>
                    @endif
                    <br><br>
                </div>
            @endforeach
        @endisset
    </div>
@endsection

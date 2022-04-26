@extends('layouts.app')

@section('title', 'Create Service')
@method('POST')

@section('content')
    <div class="div-info">
        <h1>Create Service</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div>
        <div class="content">
            <form method="POST" action="{{ url('/service/create') }}">
                @csrf
                <label for="name">Service Name</label><br>
                <input type="text" required name="name"><br>
                <label for="address">Address</label><br>
                <input type="text" required name="address"><br>
                <label for="price">Hourly Cost</label><br>
                <input type="number" required name="price"><br>
                <label for="range">Range (Km)</label><br>
                <input type="number" required name="range"><br>
                <input type="text" name="user" required hidden value="{{ Auth::user()->id }}"><br>
                <input type="submit" class="button" value="Create Service">
            </form>
        </div>
    </div>
@endsection

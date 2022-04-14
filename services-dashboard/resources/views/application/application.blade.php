@extends('layouts.app')

@section('title', 'Application')

@section('content')
    <div class="div-info">
        <h1>Application</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div class="grid">
        <div>
            <h2>Service: {{ $service['name'] }}</h2>
            <p>Price: <strong>{{ $service['price'] }}</strong>/h</p>
        </div>
        <div>
            <h2>Form</h2>
            <form action="">
                <label for="">Label</label><br>
                <input type="text" value="txt"><br>
                <input type="submit" class="button">
            </form>
        </div>
    </div>
@endsection

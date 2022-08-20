@extends('layouts.app')

@section('title', 'Edit Service')
@method('POST')

@section('content')
    <div class="div-info">
        <h1>Edit Service</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div>
        <div class="content">
            <form method="POST" action="{{ url('/service/edit') }}">
                @csrf
                <label for="name">Service Name</label><br>
                <input type="text" required name="name" value="{{ $service->name }}"><br>
                <label for="address">Address</label><br>
                <input type="text" required name="address" value="{{ $service->address }}"><br>
                <label for="price">Hourly Cost</label><br>
                <input type="number" required name="price" value="{{ $service->price }}"><br>
                <label for="range">Range (Km)</label><br>
                <input type="number" required name="range" value="{{ $service->range }}"><br>
                <input type="text" name="id" required hidden value="{{ $service->id }}"><br>
                <input type="text" name="users" required hidden value="{{ $service->users }}"><br>
                <input type="submit" class="button" value="Save">
            </form>
        </div>
    </div>
@endsection

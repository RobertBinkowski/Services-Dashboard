@extends('layouts.app')

@section('title', 'My Services')

@section('content')
    <div class="div-info">
        <h1>Services</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="grid">
        <table>
            <tr>
                <th>Service Name</th>
                <th>Address</th>
                <th>Range</th>
                <th>Price</th>
                <th>Score</th>
                <th>Edit</th>
            </tr>
            @foreach ($services as $service)
                <tr>
                    <th>{{ $service->name }}</th>
                    <th>{{ $service->address }}</th>
                    <th>{{ $service->range }}</th>
                    <th>{{ $service->price }}</th>
                    <th>{{ $service->score }}/10</th>
                    <th>
                        <a href="/service/edit/{{ $service->id }}">Edit</a>
                        <a href="/service/delete/{{ $service->id }}">Delete</a>
                    </th>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

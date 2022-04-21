@extends('layouts.app')

@section('content')
    <div class="div-info">
        <h1>service</h1>
    </div>
    <div>
        <table>
            <tr>
                <th>Service Name</th>
                <th>Address</th>
                <th>Range</th>
                <th>Price</th>
                <th>Score</th>
                <th>Userd</th>
                <th>Edit</th>
            </tr>
            @foreach ($services as $service)
                <tr>
                    <th>{{ $service->name }}</th>
                    <th>{{ $service->address }}</th>
                    <th>{{ $service->range }}</th>
                    <th>{{ $service->price }}</th>
                    <th>{{ $service->score }}/10</th>
                    <th>/////////</th>
                    <th>
                        <a href="">Delete</a>
                    </th>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

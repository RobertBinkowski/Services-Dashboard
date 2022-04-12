@extends('layouts.app')

@section('content')
    <div>
        <h1>Page does not Exist</h1>
        <a href="{{ url('/') }}">
            <p class="fa-solid fa-home"></p>
            Return Home
        </a>
    </div>
@endsection

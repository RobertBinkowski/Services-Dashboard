@extends('layouts.app')

@section('content')
    <div class="div-info">
        <h1>User</h1>
        <h2>Hello {{ Auth::user()->name }}</h2>
    </div>

    <div>
        <p></p>
    </div>
@endsection

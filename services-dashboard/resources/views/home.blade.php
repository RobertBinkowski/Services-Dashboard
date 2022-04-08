@extends('layouts.app')

@section('content')
    <div class="div-info">
        <h1>Dashboard</h1>
        <h3>Hello {{ Auth::user()->name }}</h3>
    </div>


    <div>
        <p></p>
    </div>
@endsection

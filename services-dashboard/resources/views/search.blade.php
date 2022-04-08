@extends('layouts.app')

@section('content')
    <div class="div-info">
        <h1>Search</h1>
    </div>
    <div>
        <form action="POST">
            <label for="search">Search</label>
            <br>
            <input type="text" name="search">
            <input type="button" class="button" value="search">
        </form>
    </div>
@endsection

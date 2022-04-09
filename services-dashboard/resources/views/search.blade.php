@extends('layouts.app')

@section('content')
    <div class="div-info">
        <h1>Search</h1>
    </div>
    <div id="search">
        <form action="POST">
            <input type="search" name="search" />
            <input type="submit" class="button" value="Search">
        </form>
    </div>
    <div>
        <ul>
            <a href="#">
                <li>Specialist</li>
            </a>
        </ul>
    </div>
@endsection

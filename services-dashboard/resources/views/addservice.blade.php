@extends('layouts.app')

@section('content')
    <div class="div-info">
        <h1>Add Service</h1>
    </div>
    <div id="signIn">
        <div class="content">
            <form method="POST" action="{{ route('home') }}">
                <label for="name">Service Name</label><br>
                <input type="text" name="name"><br>
                <label for="address">Address</label><br>
                <input type="text" name="address"><br>
                <label for="price">Hourly Price</label><br>
                <input type="number" name="price"><br>
                <input type="text" name="user" hidden><br>
                <input type="submit" class="button" value="Create Service">
            </form>
        </div>
    </div>
@endsection

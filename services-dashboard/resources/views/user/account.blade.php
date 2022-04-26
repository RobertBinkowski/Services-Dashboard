@extends('layouts.app')

@section('title', 'Account')
@method('POST')
@section('content')
    <section class="div-info">
        <h1>Account</h1>
        <h2>Details</h2>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <br>
        <form action="{{ url('/account/update') }}" method="POST">
            @csrf
            <div class="div-user-img">
                {{-- <img src="img/logo.png" alt="Profile Photo" class="userImg"> --}}
                <p class="fa-solid fa-user"></p>
            </div>
            <br>
            <label for="name">Username</label><br>
            <input type="text" name="name" value="{{ $user->name }}"><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" value="{{ $user->email }}"><br>
            <label for="address">Address</label><br>
            <textarea type="text" name="address">{{ $user->address }}</textarea><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" value="{{ $user->address }}"><br>
            <input type="submit" class="button" value="Save Changes"><br>
        </form>
        <form action="{{ url('/account/delete') }}" method="POST">
            @csrf
            <input type="submit" class="button" value="Delete Account" id="deleteAccount">
        </form>
    </section>
@endsection

<style scoped>

</style>

@extends('layouts.app')

@section('title', 'Account')

@section('content')
    <section class="div-info">
        <h1>Account</h1>
        <h2>Details</h2>
        <br>
        <form action="" method="POST">
            <div class="div-user-img">
                {{-- <img src="img/logo.png" alt="Profile Photo" class="userImg"> --}}
                <p class="fa-solid fa-user"></p>
            </div>
            <br>
            <label for="username">Username</label><br>
            <input type="text" name="username" value="{{ Auth::user()->name }}" disabled><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" value="{{ Auth::user()->email }}" disabled><br>
            <label for="address">Address</label><br>
            <textarea type="text" name="address" disabled>{{ Auth::user()->address }}</textarea><br>
            <input type="submit" class="button" value="Save Changes" disabled><br>
        </form>
        <form action="" method="POST">
            <input type="submit" class="button" value="Delete Account" id="deleteAccount">
        </form>
    </section>
@endsection

<style scoped>

</style>

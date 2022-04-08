@extends('layouts.app')

@section('content')
    <div id="signIn">
        <div class="content">
            <h1>{{ __('Reset Password') }}</h1>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <strong class="error-message">
                        {{ session('status') }}
                    </strong>
                </div>
            @endif
            <br>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label for="email">{{ __('Email') }}</label>
                <br>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                <br>
                @error('email')
                    <span role="alert">
                        <strong class="error-message">{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <button type="submit" class="button">
                    {{ __('Reset Password') }}
                </button>
            </form>
            @if (Route::has('password.request'))
                <a href="{{ route('register') }}">Back to Register</a>
                <a href="{{ route('login') }}">Back to Sign In</a>
            @endif
        </div>
    </div>
@endsection

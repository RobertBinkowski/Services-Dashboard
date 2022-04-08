@extends('layouts.app')

@section('content')
    <div id="signIn">
        <div class="content">

            <h1>{{ config('app.name', 'Laravel') }}</h1>
            <h2>{{ __('Sign In') }}</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email">{{ __('Email Address') }}</label>
                <br>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                <br>
                @error('email')
                    <span role="alert">
                        <strong clas="error-message">{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="password">{{ __('Password') }}</label>
                <br>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">
                <br>
                @error('password')
                    <span role="alert">
                        <strong clas="error-message">{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
                <br>
                <button type="submit" class="button">
                    {{ __('Login') }}
                </button>
                <br>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Password') }}
                    </a>
                    <br>
                    <a href="{{ route('register') }}">Register</a>
                @endif
            </form>
        </div>

    </div>
@endsection

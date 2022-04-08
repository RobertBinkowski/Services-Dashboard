@extends('layouts.app')

@section('content')
    <div id="register">
        <div class="content">
            <h1>{{ config('app.name', 'Laravel') }}</h1>
            <h2>{{ __('Register') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label for="name">{{ __('Name') }}</label>
                <br>
                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                <br />

                @error('name')
                    <span role="alert">
                        <strong clas="error-message">{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="email">{{ __('Email Address') }}</label>
                <br>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">
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
                    name="password" required autocomplete="new-password">
                <br>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong clas="error-message">{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="password-confirm">
                    {{ __('Confirm Password') }}
                </label>
                <br>
                <input id="password-confirm" type="password" name="password_confirmation" required
                    autocomplete="new-password">
                <br><br>
                <button type="submit" class="button">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
@endsection

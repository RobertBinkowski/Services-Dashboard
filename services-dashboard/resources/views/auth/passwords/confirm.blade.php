@extends('layouts.app')

@section('content')
    <div id="signIn">
        <div class="content">

            <h1>{{ __('Confirm Password') }}</h1>

            <p>{{ __('Please confirm your password before continuing.') }}</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                <br>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">
                <br>
                @error('password')
                    <span role="alert">
                        <strong class="error-message">{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <button type="submit" class="btn btn-primary">
                    {{ __('Confirm Password') }}
                </button>
                <br>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
@endsection

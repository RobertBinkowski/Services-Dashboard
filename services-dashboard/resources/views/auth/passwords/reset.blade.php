@extends('layouts.app')

@section('content')
    <div id="signIn">
        <div class="content">
            <h1>{{ __('Reset Password') }}</h1>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                <br>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <br>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong class="error-message">{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                <br>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
                <br>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="error-message">{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                <br>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
                <br>
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>
    </div>
@endsection

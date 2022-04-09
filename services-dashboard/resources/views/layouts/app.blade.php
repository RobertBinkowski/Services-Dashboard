<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Sign In</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav>

            <div>
                <ul class="nav-ul">
                    @guest
                        <a class="nav-a" href="{{ url('/') }}">
                            <li class="nav-li">
                                <p class="fa-solid fa-home"></p>
                                <strong class="nav-txt">{{ config('app.name', 'Laravel') }}</strong>
                            </li>
                        </a>
                        @if (Route::has('login'))
                            <a class="nav-a" href="{{ route('login') }}">
                                <li class="nav-li">
                                    <p class="fa-solid fa-user"></p>
                                    <strong class="nav-txt">{{ __('Sign In') }}</strong>
                                </li>
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a class="nav-a" href="{{ route('register') }}">
                                <li class="nav-li">
                                    <p class="fa-solid fa-user-plus"></p>
                                    <strong class="nav-txt">{{ __('Register') }}</strong>
                                </li>
                            </a>
                        @endif
                        {{-- <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="{{ __('Toggle navigation') }}">
                        </button> --}}
                    @else
                        <a class="nav-a" href="{{ url('/home') }}">
                            <li class="nav-li">
                                <p class="fa-solid fa-home"></p>
                                <strong class="nav-txt">Dashboard</strong>
                            </li>
                        </a>
                        <a class="nav-a" href="{{ url('/search') }}" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            <li class="nav-li">
                                <p class="fa-solid fa-search"></p>
                                <strong class="nav-txt"> Search</strong>
                            </li>
                        </a>
                        <a class="nav-a" href="{{ url('/addservice') }}" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            <li class="nav-li">
                                <p class="fa-solid fa-add"></p>
                                <strong class="nav-txt"> Add Service</strong>
                            </li>
                        </a>
                        <a class="nav-a" href="{{ url('/account') }}" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            <li class="nav-li">
                                <p class="fa-solid fa-user"></p>
                                <strong class="nav-txt"> Account</strong>
                            </li>
                        </a>

                        <a class="nav-a" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <li class="nav-li">
                                <p class="fa-solid fa-arrow-right-from-bracket"></p>
                                <strong class="nav-txt">{{ __('Logout') }}</strong>
                            </li>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
</body>

</html>

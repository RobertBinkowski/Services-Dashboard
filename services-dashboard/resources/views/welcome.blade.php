<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <title>{{ config('app.name', 'Laravel') }} - Home</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <nav>
            <ul class="nav-ul">
                <li class="nav-loc">
                    <strong class="nav-txt">{{ config('app.name', 'Laravel') }} - Home</strong>
                </li>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="nav-a">
                            <li class="nav-li">
                                <p class="fa-solid fa-chart-line"></p>
                                <strong class="nav-txt">Dashboard</strong>
                            </li>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="nav-a">
                            <li class="nav-li">
                                <p class="fa-solid fa-user"></p>
                                <strong class="nav-txt">Sign In</strong>
                            </li>
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-a">
                                <li class="nav-li">
                                    <p class="fa-solid fa-user-plus"></p>
                                    <strong class="nav-txt">Register</strong>
                                </li>
                            </a>
                        @endif
                    @endauth
                @endif
            </ul>
        </nav>
        <header id="welcomeScreeen">
            <img src="{{ asset('img/logoColor.svg') }}" alt="logo" style="max-height: 30vh;">
            <h1>Services Dashboard</h1>
            <p>By</p>
            <h2>Robert Binkowski</h2>
        </header>

        <section>
            <h2>About</h2>
        </section>

        <section>
            <h2>More</h2>
        </section>

    </main>
    @include('layouts.footer')
</body>

</html>

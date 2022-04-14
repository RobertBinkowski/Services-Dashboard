@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="div-info">
        <h1>Dashboard</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        <div class="grid">
            <div id="jobs" class="card">
                <h2>Jobs</h2>
                <div class="grid">
                    <div>
                        <a href="{{ url('#') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            v-pre>
                            <h3>
                                <p class="fa-solid fa-briefcase"></p>
                                Active
                            </h3>
                        </a>
                        <ul>


                            @foreach ($services as $service)
                                <a href="{{ url('/services/$service') }}" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    <li>
                                        {{ $service }}
                                    </li>
                                </a>
                            @endforeach

                        </ul>
                    </div>
                    <div>
                        <a href="{{ url('/#') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            v-pre>
                            <h3>
                                <p class="fa-solid fa-check-double"></p>
                                Completed
                            </h3>
                        </a>
                        <ul>
                            <a href="{{ url('/#') }}" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                <li>
                                    Contract One
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <a href="{{ url('/addservice') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <p class="fa-solid fa-add"></p>
                    Add Service
                </a><br>
            </div>
            <div id="contracts" class="card">
                <h2>Contracts</h2>
                <a href="{{ url('/#') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <h3>
                        <p class="fa-solid fa-briefcase"></p>
                        Active
                    </h3>
                </a>
                <ul>
                    <a href="{{ url('/#') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        v-pre>
                        <li>
                            Contract One
                        </li>
                    </a>
                </ul>
                <a href="{{ url('/search') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <p class="fa-solid fa-search"></p>
                    Search
                </a>
            </div>
        </div>
    </div>
@endsection


<style scoped>
    .card {

        box-shadow: 0 0 1rem 0 rgba(0, 0, 0, 0.7);
        padding: 1em;

    }

</style>

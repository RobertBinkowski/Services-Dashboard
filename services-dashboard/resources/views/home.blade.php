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
                                Current
                            </h3>
                        </a>
                        <ul>


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
                    @foreach ($contracts as $contract)
                        @if ($loop->iteration != 6)
                            <a href="{{ url('contract', ['id' => $contract->id]) }}" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <li>
                                    {{ $contract->service }}
                                    <br> <br><strong>
                                        @if ($contract->completed == 1)
                                            Complete
                                        @else
                                            Still Working
                                        @endif
                                    </strong>
                                </li>
                            </a>
                        @endif
                        @if ($loop->last)
                            <br>
                            <a href="{{ url('#') }}" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                <li>
                                    <p class="fa-solid fa-caret-down"></p>
                                    More
                                </li>
                            </a>
                        @endif
                    @endforeach

                </ul>
                <a href="{{ url('/search') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <p class="fa-solid fa-search"></p>
                    Search
                </a>
            </div>
            <div class="card">
                <a href="{{ url('#') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <h3>
                        <p class="fa-solid fa-briefcase"></p>
                        Services
                    </h3>
                </a>
                <ul>
                    @foreach ($services as $service)
                        @if ($loop->iteration != 6)
                            <a href="{{ url('service', ['id' => $service->id]) }}" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <li>
                                    {{ $service->name }}
                                </li>
                            </a>
                        @endif
                        @if ($loop->last)
                            <br>
                            <a href="{{ url('#') }}" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                <li>
                                    <p class="fa-solid fa-caret-down"></p>
                                    More
                                </li>
                            </a>
                        @endif
                    @endforeach

                </ul>
                <a href="{{ url('/addservice') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <p class="fa-solid fa-add"></p>
                    Create Service
                </a><br>
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

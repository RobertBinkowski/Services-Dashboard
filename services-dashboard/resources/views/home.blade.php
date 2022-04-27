@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="div-info">
        <h1>Dashboard</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        @if ($message = Session::get('success'))
            <div class="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="grid">
            <div class="card">
                <h2>
                    <p class="fa-solid fa-user-doctor"></p>
                    Jobs
                </h2>
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
                            @foreach ($jobs as $current)
                                @if ($current->completed == 0)
                                    <a href="{{ url('contract', ['id' => $current->id]) }}" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        <li>
                                            {{ $current->details }}
                                        </li>
                                    </a>
                                @endif
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
                            @foreach ($jobs as $current)
                                @if ($current->completed == 1)
                                    <a href="{{ url('contract', ['id' => $current->id]) }}" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        <li>
                                            {{ $current->service }}
                                        </li>
                                    </a>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="card">
                <a href="{{ url('/contract') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <h2>
                        <p class="fa-solid fa-book"></p>
                        Contracts
                    </h2>
                </a>
                <ul>
                    @foreach ($contracts as $contract)
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
                    @endforeach

                </ul>
                <a href="{{ url('/search') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <p class="fa-solid fa-search"></p>
                    Search
                </a>
            </div>
            <div class="card">
                <a href="{{ url('/service') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <h2>
                        <p class="fa-solid fa-briefcase"></p>
                        Your Services
                    </h2>
                </a>
                <ul>
                    @foreach ($services as $service)
                        <a href="/service/edit/{{ $service->id }}" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            <li>
                                {{ $service->name }}
                            </li>
                        </a>
                    @endforeach

                </ul>
                <a href="{{ url('/service/create') }}" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" v-pre>
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

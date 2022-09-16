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
                        {{-- <a href="{{ url('#') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> --}}
                        <h3>
                            <p class="fa-solid fa-briefcase"></p>
                            Current
                        </h3>
                        {{-- </a> --}}
                        <ul>
                            @foreach ($jobs as $current)
                                @if(App\Models\Service::find($current->service)->users == Auth::id())
                                    @if ($current->status == 'Active' || $current->status == 'Created')
                                        <a href="{{ url('contract/show', ['id' => $current->id]) }}" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" v-pre>
                                            <li>
                                                {{ App\Models\Service::find($current->service)->name }}
                                                <p class="alert">{{$current->status}}</p>
                                            </li>
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        {{-- <a href="{{ url('/#') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            v-pre> --}}
                        <h3>
                            <p class="fa-solid fa-check-double"></p>
                            Completed
                        </h3>
                        {{-- </a> --}}
                        <ul>
                            @foreach ($jobs as $current)
                                @if(App\Models\Service::find($current->service)->users == Auth::id())
                                    @if ($current->status == 'Complete'|| $current->status == 'Payment')
                                        <a href="{{ url('contract/show', ['id' => $current->id]) }}" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" v-pre>
                                            <li>
                                                {{ App\Models\Service::find($current->service)->name }}
                                                <p class="alert">{{$current->status}}</p>
                                            </li>
                                        </a>
                                    @endif
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
                        @if ($contract->status != "Cancelled")
                            <a href="{{ url('contract/show', ['id' => $contract->id]) }}" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <li>
                                    <h3>{{ App\Models\Service::find($contract->service)->name }}</h3>

                                    <strong>
                                        @if ($contract->status == "Payment"||$contract->status == "Created")
                                        <p class="alert">{{$contract->status}}</p>
                                        @else
                                            <p class="alert">{{$contract->status}}</p>
                                        @endif
                                    </strong>
                                </li>
                            </a>
                        @endif
                    @endforeach

                </ul>
                <a href="{{ url('/search') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <p class="fa-solid fa-search"></p>
                    Search
                </a>
                <a href="{{ url('/contract') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <p>
                        <p class="fa-solid fa-book"></p>
                        History
                    </p>
                </a>
                <a href="{{ url('/signature/form') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <p>
                        <p class="fa-solid fa-pen-nib"></p>
                        Check Digital Signature
                    </p>
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
                                {{ $service->name }} <br>
                                @if ($service->rating != 0)
                                    {{$service->rating}}/10
                                @else
                                    No Reviews
                                @endif
                            </li>
                        </a>
                    @endforeach

                </ul>
                <a href="{{ url('/service') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <p>
                        <p class="fa-solid fa-briefcase"></p>
                        More Services
                    </p>
                </a>
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

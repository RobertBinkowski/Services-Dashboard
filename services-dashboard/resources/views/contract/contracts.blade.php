@extends('layouts.app')

@section('title', 'Contracts')

@section('content')
    <div class="div-info">
        <h1>Contracts</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        <div>
            <ul>
                @foreach ($contracts as $contract)
                    <a href="{{ url('contract', ['id' => $contract->id]) }}" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        <li>
                            <h3>Service</h3>
                            <p>
                                Address: <br> {{ $contract->address }} <br>
                                Details: <br>{{ $contract->details }} <br>
                                <br><br>
                                <strong>
                                    @if ($contract->completed == 1)
                                        Complete
                                    @else
                                        Unfinished
                                    @endif
                                </strong>
                                <br>
                                details: <br><br>
                                {{ $contract->details }}
                                <br><br>
                                Signature:
                                @if ($contract->document != '')
                                    <br>
                                    <img src="/signs/{{ $contract['document'] }}" alt="document signature">
                                @else
                                    <strong>
                                        No Signature Provided
                                    </strong>
                                @endif
                            </p>
                        </li>
                    </a>
                    <br>
                @endforeach

            </ul>
        </div>
    </div>
@endsection

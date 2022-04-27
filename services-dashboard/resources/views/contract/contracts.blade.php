@extends('layouts.app')

@section('title', 'Contracts')

@section('content')
    <div class="div-info">
        <h1>Contracts</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        <div>
            <div class="grid">
                <table>
                    <tr>
                        <th>Service</th>
                        <th>Address</th>
                        <th>Details</th>
                        <th>Completion</th>
                        <th>Signature</th>
                        <th>More</th>
                    </tr>
                    @foreach ($contracts as $contract)
                        <tr>

                            <th>Service</th>
                            <th>{{ $contract->address }}</th>
                            <th>{{ $contract->details }}</th>
                            <th>
                                @if ($contract->completed == 1)
                                    Complete
                                @else
                                    Unfinished
                                @endif
                            </th>
                            <th>
                                @if ($contract->document != '')
                                    <img src="/signs/{{ $contract->document }}" alt="document signature">
                                @else
                                    <strong>
                                        No Signature Provided
                                    </strong>
                                @endif
                            </th>
                            <th>
                                <a href="{{ url('contract', ['id' => $contract->id]) }}" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    <p class="fa-solid fa-pen-to-square"></p>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

<style scoped>
    img {
        height: 3em;
    }

</style>

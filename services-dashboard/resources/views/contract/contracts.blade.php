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
                        {{-- <th>ID:</th> --}}
                        <th>Service</th>
                        <th>Address</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Cost</th>
                    </tr>
                    @foreach ($contracts as $contract)
                        <tr>
                            <th>
                                {{ App\Models\Service::find($contract->service)->name }}
                            </th>
                            <th>
                                {{ $contract->address }}
                            </th>
                            <th>
                                {{ $contract->details }}
                            </th>
                            <th>
                                {{$contract->status }}
                            </th>
                            <th>
                                {{ $contract->cost }}
                            </th>
                            <th>
                                <a href="{{ url('contract/show', ['id' => $contract->id]) }}" data-bs-toggle="dropdown"
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

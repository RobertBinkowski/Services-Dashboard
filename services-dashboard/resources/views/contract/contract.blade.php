@extends('layouts.app')

@section('title', 'Contract')

@section('content')
    <div class="div-info">
        <h1>Contract</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        <div>
            @isset($service)
                <h3>{{ $service->name }}</h3>
            @endisset
            <p>
                Status: <strong>
                    @if ($contract->completed == 1)
                        Complete
                    @else
                        Unfinished
                    @endif
                </strong><br><br>
                details: <br>
                {{ $contract->details }}
                <br><br>
                Signature:
                @if ($contract->document != '')
                    <br><br>
                    <img src="/signs/{{ $contract->document }}" alt="document signature" height="100px">
                @else
                    <strong>
                        No Signature Provided
                    </strong>
                @endif
                </a>
            </p>
            @isset($operations)
                <div id="operations">
                    <h4>Operations</h4>
                    <ol class="grid">
                        @foreach ($operations as $operation)
                            <li>
                                Work Day <br>
                                Start Time: <br>
                                {{ $operations->start_date }} <br>
                                End Time: <br>
                                {{ $operations->end_date }} <br>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endisset
        </div>
    </div>
@endsection

<style scoped>
    img {
        border-radius: .3em;
    }

    #operations {
        max-width: 1000px;
        margin: auto;
    }

</style>

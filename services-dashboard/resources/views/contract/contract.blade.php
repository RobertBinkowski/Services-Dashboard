@extends('layouts.app')

@section('title', 'Contract')

@section('content')
    <div class="div-info">
        <h1>Contract</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        @if ($message = Session::get('success'))
            <div class="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div>
            @isset($service)
                <h3>{{ $service->name }}</h3>
            @endisset
            <p>
                Status: <div class="alert"><strong>
                    {{$contract->status}}
                    @if ($contract->status != 'Created'|| $contract->status != 'Cancelled')
                        <br><br>
                        Cost: <strong class="cost">€{{$contract->cost}}</strong>
                    @endif
                </strong>
                </div>
                Contract: <br>
                <textarea readonly>{{$contract->document}}</textarea><br>
                Details: <br>
                <textarea readonly>{{ $contract->details }}</textarea><br>
                <br><br>
                <div style="display:inline-block;">
                    <div>
                        User Signature: <br>
                        @if ($contract->customer_signature != '')
                            <img src="{{$contract->customer_signature}}" alt="Customer Signature">

                        @else
                            <strong>
                                No Signature Provided
                            </strong>
                        @endif
                    </div>
                    <div>
                        <br>
                        Specialist Signature: <br>
                        @if ($contract->specialist_signature != '')
                            <img src="{{$contract->specialist_signature}}" alt="Specialist Signature">
                        @else
                            <strong>
                                No Signature Provided
                            </strong>
                        @endif
                    </div>
                </div>
            </p>

            @if ($contract->status == 'Active')
                @isset($operations)
                    <div id="operations">
                        <h4>Operations</h4>
                        <div class="grid">
                            @foreach ($operations as $op => $operation)
                                <a href="{{ url('/service/operation/edit',['id' => $operation]) }}">
                                    Day <br>
                                    <strong class="cost">{{ $operation->date }}</strong><br>
                                    Duration: <br>
                                    <strong class="cost">{{ $operation->duration }}</strong> Hours <br>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @else
                    No Operations
                @endisset
                @if ($service->users == Auth::user()->id)
                <br><br><br>
                    <a href="{{ url('service/operation/create', ['id' => $contract->id]) }}" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre class="button">
                        Add Work Day
                    </a>
                    <br><br><br>
                    <form action="{{url('service/complete')}}" method="POST">
                        @csrf
                        <input type="number" name="id" readonly hidden value="{{$service->id}}">
                        <input type="submit" class="button" value="Set As Finished">
                    </form>
                @endif
            @endif
            @if ($contract->status == 'Created' && $service->users == Auth::user()->id)
                {{-- Specialist Accept form --}}
                <br><br><br>
                <h2>Response</h2>
                <h3>Signature</h3>
                    <form action="{{ url('/contract/acceptContract') }}" method="POST">
                        @csrf
                        <input type="text" readonly style="display: none" name="contractID" value="{{$contract->id}}">
                        <input type="text" readonly style="display: none" name="id" value="{{Auth::user()->id}}">
                        <label for="signature"></label>
                        <div id="signaturePad"></div>
                        <br /><br>
                        <textarea name="document" hidden readonly>{{$contract->document}}</textarea>
                        <textarea id="signature64" name="signature" hidden></textarea>
                        <input type="button" id="clear" value="Clear" class="button"><br><br>
                        <input type="submit" value="Accept" class="button">
                    </form>
                    <h3>Or</h3>
                    <br>
                    <a href="/contract/reject/{{ $contract->id }}" class="button">
                        <p class="fa-solid fa-trash"></p>
                        Delete
                    </a>
                    <br><br>
                    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
                    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
                    <script type="text/javascript">
                        var signaturePad = $('#signaturePad').signature({
                            syncField: '#signature64',
                            syncFormat: 'PNG',
                            color: '#1792df',
                            background: '#00000000',
                            border: 'none',
                        });
                        $('#clear').click(function(e) {
                            e.preventDefault();
                            signaturePad.signature('clear');
                            $("#signature64").val('');
                        });
                    </script>
            @endif

            @if ($contract->status == 'Payment' && $contract->users == Auth::user()->id)
                    <a href="{{ url('service/payment', ['id' => $contract->id]) }}" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre class="button">
                        Pay For Service
                    </a>
            @endif
            @if ($contract->status == 'Complete' && $contract->users == Auth::user()->id)
                    <a href="{{ url('service/review', ['id' => $contract->id]) }}" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre class="button">
                        Review
                    </a>
            @endif
        </div>
    </div>
@endsection

<style scoped>
    img {
        border-radius: .3em;
    }


    textarea{
        width: 30em;
        height: 10em;
        resize: vertical;
        background-color: #00000000;
        color: #58d68d;
        border: 1px solid #58d68d;
    }
    .cost{
        color: #58d68d;
    }
    .signature{
        width: 20em;
        height: 20em;
        margin: auto;
        padding: auto;
        background-color: #00000000;
        border: 1px solid #58d68d;
    }
    #operations {
        max-width: 1000px;
        margin: auto;
    }

</style>

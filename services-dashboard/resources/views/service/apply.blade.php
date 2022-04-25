@extends('layouts.app')

@section('title', 'Application')

@method('POST')

@section('content')
    <div class="div-info">
        <h1>Application</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        @if ($message = Session::get('success'))
            <div class="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ url('/service/apply') }}">
            @csrf
            <input type="hidden" name="name" value="{{ Auth::user()->id }}">
            <p>
                Service: <strong>{{ $service->name }}</strong><br>
                Score: <strong>{{ $service->score }}</strong><br>
                Cost: <strong>{{ $service->price }}</strong>/h
            </p><br>
            <input type="hidden" name="service" value="{{ $service->id }}">
            <br>
            <label for="address">Address</label><br><br>
            <input type="text" name="address" value="{{ Auth::user()->address }}">
            <br><br>
            <label for="details">Details</label><br>
            <textarea type="text" name="details"></textarea><br><br>
            <label for="signaturePad">Signature</label>
            <br />
            <div id="signaturePad"></div>
            <br /><br>
            <input type="button" id="clear" value="Clear" class="button"><br>
            <label for="submit">*By Applying you agree to our <a href="./">policy</a></label><br>
            <textarea id="signature64" name="signed" style="display: none"></textarea>
            <input type="submit" submit class="button" value="Apply">
        </form>


        <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
        <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
        <script type="text/javascript">
            var signaturePad = $('#signaturePad').signature({
                syncField: '#signature64',
                syncFormat: 'PNG'
            });
            $('#clear').click(function(e) {
                e.preventDefault();
                signaturePad.signature('clear');
                $("#signature64").val('');
            });
        </script>
    </div>
@endsection


<style scoped>
    .card {
        box-shadow: 0 0 1rem 0 rgba(0, 0, 0, 0.7);
        padding: 1em;
    }

    .kbw-signature {
        height: 180px;
        width: 400px;
        border-radius: .2em;

    }

    #signaturePad canvas {
        width: 100% !important;
        height: auto;
        border-radius: .2em;
        border-bottom: #58d68d solid 2px;
    }

</style>

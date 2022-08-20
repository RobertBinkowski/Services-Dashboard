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
            <label for="details">Details</label><br><br>
            <textarea type="text" name="details"></textarea><br><br>
            <label for="contract">Contract</label><br><br>
            <textarea name="contract" readonly>{{ $service->contract }}</textarea><br><br>
            <label for="signaturePad">Signature</label>
            <br /><br>
            <div id="signaturePad"></div>
            <br /><br>
            <input type="button" id="clear" value="Clear" class="button"><br><br>
            <textarea id="signature64" name="signature" style="display: none"></textarea>
            <label for="submit">*By Applying you agree to our <a href="/policy">policy</a></label><br><br>
            <input type="submit" submit class="button" value="Apply">
        </form>


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
    </div>
@endsection


<style scoped>

</style>

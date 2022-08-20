@extends('layouts.app')

@section('title', 'Signature Check')

@section('content')
    <div class="div-info">
        <h1>Digital Signature Check</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        @if ($message = Session::get('success'))
            <div class="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form action="{{ url('/signature/form') }}" method="POST">
            @csrf
            <label for="Score">Signature</label><br>
            <textarea type="text" name="signature"></textarea><br>
            <label for="Score">Document</label><br>
            <textarea type="text" name="document"></textarea><br>
            <input type="submit" class="button" value="Submit">
        </form>
    </div>
@endsection

<style scoped>


</style>

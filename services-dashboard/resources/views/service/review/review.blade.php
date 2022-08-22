@extends('layouts.app')

@section('title', 'Review')

@section('content')
    <div class="div-info">
        <h1>Review</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        @if ($message = Session::get('success'))
            <div class="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <h2>{{ App\Models\Service::find($contract->service)->name }}</h2>
        <form action="{{ url('/service/review') }}" method="POST">
            @csrf
            <input type="number" name="id" hidden readonly value="{{$contract->service}}">
            <input type="number" name="service" hidden readonly value="{{$contract->service}}">
            <label for="Score">Review</label><br>
            <input type="number" name="score" required value="5" pattern="[0-10]"><br>
            <input type="submit" class="button" value="Submit">
        </form>
    </div>
@endsection

<style scoped>


</style>

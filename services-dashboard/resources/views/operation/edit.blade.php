@extends('layouts.app')

@section('title', 'Contract')
@method('POST')

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
        <form method="POST" action="{{ url('/service/operation') }}">
            @csrf
            <input type="text" name="contract" value="{{ $operation->contract }}" hidden>
            <label for="start_date">Start Date</label><br>
            <input type="date" required name="start_date" value="{{ $operation->start_date }}"><br>
            <label for="end_date">End Date</label><br>
            <input type="date" required name="end_date" value="{{ $operation->end_date }}"><br>
            <label for="duration">Hours Worked</label><br>
            <input type="number" required name="duration" value="{{ $operation->duration }}"><br>
            <input type="submit" class="button" value="Create Operation">
        </form>
    </div>
@endsection

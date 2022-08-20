@extends('layouts.app')

@section('title', 'Operation')
@method('POST')

@section('content')
    <div class="div-info">
        <h1>Create Operation</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        @if ($message = Session::get('success'))
            <div class="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ url('/service/operation/create') }}">
            @csrf
            <input type="number" name="contract" value="{{ $contract }}" hidden readonly>
            <label for="start_date">Date</label><br>
            <input type="date" required name="date"><br>
            <label for="duration">Hours Worked</label><br>
            <input type="number" required name="duration"><br>
            <input type="submit" class="button" value="Create Operation">
        </form>
    </div>
@endsection

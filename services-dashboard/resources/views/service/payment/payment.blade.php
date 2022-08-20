@extends('layouts.app')

@section('title', 'Payment')

@section('content')
    <div class="div-info">
        <h1>Payment</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        Price: <strong>€{{ $contract->cost }}</strong>
        <form action="{{ url('/service/payment') }}" method="POST">
            @csrf
            <input type="number" name="id" hidden readonly value="{{$contract->id}}">
            <input type="number" name="service" hidden readonly value="{{$contract->service}}">
            <label for="Score">Review</label><br>
            <input type="number" name="score" required value="5" pattern="[0-10]"><br>
            <input type="submit" class="button" value="Submit">
        </form>
    </div>
@endsection

<style scoped>


</style>

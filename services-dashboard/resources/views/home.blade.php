@extends('layouts.app')

@section('content')
    <div class="div-info">
        <h1>Dashboard</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        <div class="cards grid">
            <div>
                <h3>Your Services</h3>
                <a href="{{ url('/addservice') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    v-pre>
                    <p class="fa-solid fa-add"></p>
                    Create Service
                </a>
            </div>
            <div>
                <h3>Services</h3>
                <a href="{{ url('/search') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <p class="fa-solid fa-search"></p>
                    Search For Services
                </a>
            </div>
        </div>
    </div>
@endsection


<style scoped>
    .cards div {

        box-shadow: 0 0 1rem 0 rgba(0, 0, 0, 0.7);
        padding: 1em;

    }

</style>

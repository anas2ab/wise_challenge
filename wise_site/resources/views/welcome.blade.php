@extends('layouts.app')
@section('content')
@php( $quotes = DB::table('quotes')->get()) 

    
    @forelse($quotes as $quo)
    <div class="container center-block">
    <img src="https://picsum.photos/600/?random={{ $quo->id }}" class="rounded mx-auto d-block" alt="..." style="height:50%;">
    <br/>
    <div class="text-center">
        <h5><cite>&quot;{{$quo->quote}}&quot;</cite></h5>
        <p>Taken from Episode: {{ $quo->episode }}, Season: {{ $quo->season }}</p>
    </div>
    </div>
    @empty
    <div class="container text-center">
    <h1>No entries found. </h1>
    </div>
    @endforelse
@endsection
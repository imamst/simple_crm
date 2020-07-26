@extends('layouts.error')

@section('title')
    503 | Service Unavailable
@endsection

@section('content')
    <h1 class="error-number">503</h1>
    <p class="mini-text">Ooops!</p>
    <p class="error-text">Service Unavailable!</p>
    <a href="{{url('dashboard')}}" class="btn btn-primary mt-5">Go Back</a>
@endsection
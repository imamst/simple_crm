@extends('layouts.error')

@section('title')
    404 | Not Found
@endsection

@section('content')
    <h1 class="error-number">404</h1>
    <p class="mini-text">Ooops!</p>
    <p class="error-text mb-4 mt-1">The page you requested was not found!</p>
    <a href="{{url('dashboard')}}" class="btn btn-primary mt-5">Go Back</a>
@endsection
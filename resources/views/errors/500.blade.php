@extends('layouts.error')

@section('title')
    500 | Internal Server Error
@endsection

@section('content')
    <h1 class="error-number">500</h1>
    <p class="mini-text">Ooops!</p>
    <p class="error-text">Internal Server Error!</p>
    <a href="{{url('dashboard')}}" class="btn btn-primary mt-5">Go Back</a>
@endsection
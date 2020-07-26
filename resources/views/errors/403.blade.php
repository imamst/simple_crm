@extends('layouts.error')

@section('title')
    403 | Access Forbidden
@endsection

@section('content')
    <h1 class="error-number">403</h1>
    <p class="mini-text">Ooops!</p>
    <p class="error-text mb-4 mt-1">Access Forbidden</p>
    <a href="{{url('dashboard')}}" class="btn btn-primary mt-5">Go Back</a>
@endsection
@extends('layouts.authentication')

@section('title')
    Login
@endsection

@section('content')

<div class="form-content">
    <h1 class="text-capitalize">Sign In</h1>
    <p class="">Log in to your account to continue.</p>
    
    <form method="POST" action="{{ route('login') }}" class="text-left">
        @csrf

        @include('auth.login-form')
    </form>

</div>
@endsection

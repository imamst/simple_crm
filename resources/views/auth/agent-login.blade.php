@extends('layouts.authentication')

@section('title')
    Login
@endsection

@section('content')

<div class="form-content">
    <h1 class="text-capitalize">Sign In</h1>
    <p class="">Log in to your account to continue.</p>
    
    @if(session('error'))
        <div class="alert alert-danger mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            {{session('error')}}</button>
        </div> 
    @endif
    
    <form method="POST" action="{{ route('login.agent') }}" class="text-left">
        @csrf

        @include('auth.login-form')
    </form>

</div>
@endsection

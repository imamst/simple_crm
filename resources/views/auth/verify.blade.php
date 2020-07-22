@extends('layouts.authentication')

@section('title')
    Verify Email Address
@endsection

@section('content')
@if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
@endif
<div class="form-content mt-2">
    <h1 class="">{{ __('Verify Your Email Address') }}</h1>
    <p class="signup-link recovery">{{ __('Before proceeding, please check your email for a verification link.') }} {{ __('If you did not receive the email') }},</p>
    <form class="text-left" action="{{ route('verification.resend') }}" method="POST">
        @csrf
        <div class="form">
            <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper">
                    <button type="submit" class="btn btn-primary">{{ __('click here to request another') }}</button>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection

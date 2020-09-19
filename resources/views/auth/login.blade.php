@extends('layouts.authentication')

@section('title')
    Login
@endsection

@section('content')

<div class="form-content">
    <h1 class="text-capitalize">Sign In</h1>
    <p class="">Log in to your account to continue.</p>
    
    <form id="loginForm" method="POST" action="{{ route('login') }}" class="text-left">
        @csrf

        <div class="form">
            @include('auth.login-form')
        </div>
    </form>

</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        const landlord_login_url = "{!! route('login') !!}";
        const agent_login_url = "{!! route('login.agent') !!}";

        $("#role").on("change", function(){
            let role_number = $(this).val();

            if(role_number == "1")
            {
                $("#loginForm").attr("action", landlord_login_url);
            }
            else if(role_number == "2")
            {
                $("#loginForm").attr("action", agent_login_url);
            }
        });
    });
</script>
@endpush
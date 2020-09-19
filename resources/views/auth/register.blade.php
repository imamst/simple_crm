@extends('layouts.authentication')

@section('title')
    Register
@endsection

@section('content')
<div class="form-content">

    <h1 class="">Register</h1>
    <p class="signup-link register">Already have an account? <a href="{{url('login')}}">Log in</a></p>
    <form class="text-left" action="{{route('register')}}" method="post">
        @csrf
        <div class="form">

            <div id="national_id-field" class="field-wrapper input">
                <label for="national_id">NATIONAL ID <span class="text-danger">*</span></label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <input id="national_id" name="national_id" type="text" class="form-control" placeholder="National ID" value="{{ old('national_id') ?? null }}" required>

                @error('national_id')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div id="firstname-field" class="field-wrapper input">
                <label for="firstname">FIRST NAME <span class="text-danger">*</span></label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <input id="firstname" name="first_name" type="text" class="form-control" placeholder="First Name" value="{{ old('first_name') ?? null }}" required>

                @error('first_name')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div id="family_name-field" class="field-wrapper input">
                <label for="family_name">FAMILY NAME <span class="text-danger">*</span></label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <input id="family_name" name="family_name" type="text" class="form-control" placeholder="Family Name" value="{{ old('family_name') ?? null }}" required>

                @error('family_name')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div id="phone_number-field" class="field-wrapper input">
                <label for="phone_number">PHONE NUMBER <span class="text-danger">*</span></label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone" style="top:50px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                <input id="phone_number" name="phone_number" type="text" class="form-control" placeholder="Phone Number" value="{{ old('phone_number') ?? null }}" required>

                @error('phone_number')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div id="address-field" class="field-wrapper input">
                <label for="address">ADDRESS <span class="text-danger">*</span></label>
                <textarea id="address" name="address" class="form-control" placeholder="Address" required>{{ old('address') ?? null }}</textarea>

                @error('address')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div id="email-field" class="field-wrapper input">
                <label for="email">EMAIL <span class="text-danger">*</span></label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') ?? null }}" required>

                @error('email')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div id="password-field" class="field-wrapper input mb-2">
                <div class="d-flex justify-content-between">
                    <label for="password">PASSWORD <span class="text-danger">*</span></label>
                    <a href="{{route('password.request')}}" class="forgot-pass-link">Forgot Password?</a>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                <input id="password" name="password" type="password" class="form-control password" placeholder="Password" required>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                @error('password')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div id="password_confirmation-field" class="field-wrapper input mb-2">
                <div class="d-flex justify-content-between">
                    <label for="password_confirmation">PASSWORD CONFIRMATION <span class="text-danger">*</span></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control password" placeholder="Password Confirmation" required>
            </div>

            <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper">
                    <button type="submit" class="btn btn-primary">Register Now</button>
                </div>
            </div>

        </div>
    </form>

</div>  
@endsection

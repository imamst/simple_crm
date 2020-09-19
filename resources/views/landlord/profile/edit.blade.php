@extends('layouts.app')

@section('title')
    Edit Profile
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/dropify/dropify.min.css')}}">
<link href="{{asset('assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="layout-px-spacing">                
                    
    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="general-info" class="section general-info" method="POST" action="{{route('profile.update',$landlord->national_id)}}" enctype="multipart/form-data">
                            @csrf
                            @method("patch")
                            <div class="info">
                                <h6 class="">General Information</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" id="input-file-max-fs" name="avatar" class="dropify" data-default-file="{{($landlord->avatar != null) ? asset('storage/'.$landlord->avatar) : asset('storage/img/200x200.jpg') }}" data-max-file-size="1M" />
                                                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Profile Picture</p>
                                                    @error('avatar')
                                                        <span class="invalid-feedback d-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="firstName">First Name</label>
                                                                <input type="text" class="form-control" id="firstName" placeholder="First Name" name="first_name" value="{{$landlord->first_name}}" required>
                                                                @error('first_name')
                                                                    <span class="invalid-feedback d-block">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="familyName">Family Name</label>
                                                                <input type="text" class="form-control" id="familyName" placeholder="Family Name" name="family_name" value="{{$landlord->family_name}}" required>
                                                                @error('family_name')
                                                                    <span class="invalid-feedback d-block">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Phone Number</label>
                                                                <input type="text" class="form-control" id="phone" name="phone_number" placeholder="Write your phone number here" value="{{$landlord->phone_number}}" required>
                                                                @error('phone_number')
                                                                    <span class="invalid-feedback d-block">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" class="form-control" id="email" placeholder="Write your email here" name="email" value="{{$landlord->email}}" required>
                                                                @error('email')
                                                                    <span class="invalid-feedback d-block">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <textarea class="form-control" id="address" placeholder="Address" name="address" required>{{$landlord->address}}</textarea>
                                                        @error('address')
                                                            <span class="invalid-feedback d-block">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <p>Leave password field blank if don't want to change</p>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control password" id="password" name="password">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="toggle-password feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                                                    </div>
                                                                </div>
                                                                @error('password')
                                                                    <span class="invalid-feedback d-block">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="password-confirmation">Re-type Password</label>
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control password" id="password-confirmation" name="password_confirmation">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="toggle-password feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="account-settings-footer">
            
            <div class="as-footer-container text-right">
                <button id="cancelBtn" class="btn btn-warning">Cancel</button>
                <button id="formSubmitBtn" class="btn btn-primary">Save Changes</button>
            </div>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="{{asset('plugins/dropify/dropify.min.js')}}"></script>
<script>
$(document).ready(function(){

    let input_type = "password";

    $(".toggle-password").on("click", function(){
        if(input_type === "password")
        {
            $(".password").attr("type", "text");
            input_type = "text";
        }
        else {
            $(".password").attr("type", "password");
            input_type = "password";
        }
    });

    $('.dropify').dropify({
        messages: { 'default': 'Click to Upload or Drag n Drop', 'remove':  '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
    });

    setTimeout(function(){ $('.list-group-item.list-group-item-action').last().removeClass('active'); }, 100);

    $("#formSubmitBtn").on("click", function(){
        $("#general-info").submit();
    });

    $("#cancelBtn").on("click", function(){
        window.history.back();
    });
});
</script>
@endpush
@extends('layouts.app')

@section('title')
    Add New Agent
@endsection

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h2 class="p-3">Add New Agent</h2>
                        </div>
                    </div>
                </div>
                <div class="widget-content-area br-4">
                    <div class="widget-one">
                        <form class="form-vertical" method="POST" action="{{route('agents.store')}}">
                        @csrf
                        <div class="form">
                            <div class="form-group mb-4">
                                <label class="control-label">National ID <span class="text-danger">*</span></label>
                                <input type="text" name="national_id" class="form-control" value="{{ $agent->national_id ?? old('national_id') ?? null }}" required>
                                @error('national_id')
                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @include('agent.form')
                            <div class="form-group mb-4">
                                <label class="control-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group"> 
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                        </div>
                                    </div>
                                    <input type="password" name="password" class="form-control" required>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-4">
                                <label class="control-label">Password Confirmation <span class="text-danger">*</span></label>
                                <div class="input-group"> 
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                        </div>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
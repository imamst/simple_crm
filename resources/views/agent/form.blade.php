<div class="form-group mb-4">
    <label class="control-label">National ID <span class="text-danger">*</span></label>
    <input type="text" name="national_id" class="form-control" value="{{ $agent->national_id ?? old('national_id') ?? null }}" required>
    @error('national_id')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-4">
    <label class="control-label">First Name <span class="text-danger">*</span></label>
    <input type="text" name="first_name" class="form-control" value="{{ $agent->first_name ?? old('first_name') ?? null }}" required>
    @error('first_name')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-4">
    <label class="control-label">Family Name <span class="text-danger">*</span></label>
    <input type="text" name="family_name" class="form-control" value="{{ $agent->family_name ?? old('family_name') ?? null }}" required>
    @error('family_name')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-4">
    <label class="control-label">Phone Number <span class="text-danger">*</span></label>
    <input type="text" name="phone_number" class="form-control" value="{{ $agent->phone_number ?? old('phone_number') ?? null }}" required>
    @error('phone_number')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-4">
    <label class="control-label">Address <span class="text-danger">*</span></label>
    <textarea id="address" name="address" class="form-control" placeholder="Address" required>{{ $agent->address ?? old('address') ?? null }}</textarea>
    @error('address')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-4">
    <label class="control-label">Email <span class="text-danger">*</span></label>
    <div class="input-group"> 
        <div class="input-group-prepend">
            <div class="input-group-text">@</div>
        </div>
        <input type="email" name="email" class="form-control" value="{{ $agent->email ?? old('email') ?? null }}" required> 
    </div>
    @error('email')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

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
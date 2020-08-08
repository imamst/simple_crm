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
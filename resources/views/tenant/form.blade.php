<input type="hidden" name="token" value="{{$token}}">

<div id="firstname-field" class="field-wrapper input">
    <label for="firstname">FIRST NAME <span class="text-danger">*</span></label>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
    <input id="firstname" name="first_name" type="text" class="form-control" placeholder="First Name" value="{{ $tenant->first_name ?? old('first_name') ?? null }}" disabled>

    @error('first_name')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div id="family_name-field" class="field-wrapper input">
    <label for="family_name">FAMILY NAME <span class="text-danger">*</span></label>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
    <input id="family_name" name="family_name" type="text" class="form-control" placeholder="Family Name" value="{{ $tenant->family_name ?? old('family_name') ?? null }}" disabled>

    @error('family_name')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div id="email-field" class="field-wrapper input">
    <label for="email">EMAIL <span class="text-danger">*</span></label>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
    <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ $tenant->email ?? old('email') ?? null }}" disabled>
</div>

<div id="phone_number-field" class="field-wrapper input">
    <label for="phone_number">PHONE NUMBER <span class="text-danger">*</span></label>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone" style="top:50px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
    <input id="phone_number" name="phone_number" type="text" class="form-control" placeholder="Phone Number" value="{{ $tenant->phone_number ?? old('phone_number') ?? null }}" required>

    @error('phone_number')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div id="address-field" class="field-wrapper input">
    <label for="address">ADDRESS <span class="text-danger">*</span></label>
    <textarea id="address" name="address" class="form-control" placeholder="Address" required>{{ $tenant->address ?? old('address') ?? null }}</textarea>

    @error('address')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div id="profession-field" class="field-wrapper input">
    <label for="profession">PROFESSION <span class="text-danger">*</span></label>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
    <input id="profession" name="profession" type="text" class="form-control" placeholder="Profession" value="{{ $tenant->profession ?? old('profession') ?? null }}" required>

    @error('profession')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div id="company-field" class="field-wrapper input">
    <label for="company">COMPANY <span class="text-danger">*</span></label>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
    <input id="company" name="company" type="text" class="form-control" placeholder="Company" value="{{ $tenant->company ?? old('company') ?? null }}" required>

    @error('company')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div id="income-field" class="field-wrapper input">
    <label for="income">INCOME / YEAR <span class="text-danger">*</span></label>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
    <input id="income" name="income" type="text" class="form-control" placeholder="in SAR" value="{{ $tenant->income ?? old('income') ?? null }}" required>

    @error('income')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div id="photo-field" class="field-wrapper input custom-file-container" data-upload-id="photoFile">
    <label for="photo">UPLOAD PHOTO (optional) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear File">x</a></label>
    <label class="custom-file-container__custom-file">
        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="photo">
        <input type="hidden" name="MAX_FILE_SIZE" value="5485760" />
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    @error('photo')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @if(isset($tenant))
        @if($tenant->photo != null)
            <a class="mt-3" target="_blank" href="{{asset('storage/'.$tenant->photo)}}"><span class="badge badge-success">Photo Available</span></a>
        @endif
    @endif
    <div class="custom-file-container__image-preview"></div>
</div>

<div class="form-group mb-4">
    <label class="control-label">Contract Number <span class="text-danger">*</span></label>
    <input type="text" name="contract_number" class="form-control" value="{{ $contract->contract_number ?? old('contract_number') ?? null }}" required>
    @error('contract_number')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-4">
    <label class="control-label">Customer First Name <span class="text-danger">*</span></label>
    <input type="text" name="tenant_first_name" class="form-control" value="{{ $contract->tenant->first_name ?? old('tenant_first_name') ?? null }}" required>
    @error('tenant_first_name')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-4">
    <label class="control-label">Customer Family Name <span class="text-danger">*</span></label>
    <input type="text" name="tenant_family_name" class="form-control" value="{{ $contract->tenant->family_name ?? old('tenant_family_name') ?? null }}" required>
    @error('tenant_family_name')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-4">
    <label class="control-label">Customer Email <span class="text-danger">*</span></label>
    <div class="input-group"> 
        <div class="input-group-prepend">
            <div class="input-group-text">@</div>
        </div>
        <input type="email" name="tenant_email" class="form-control" value="{{ $contract->tenant->email ?? old('tenant_email') ?? null }}" required> 
    </div>
    @error('tenant_email')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-4">
    <label class="control-label">Rent Duration <span class="text-danger">*</span></label>
    <div class="row">
        <div class="col">
            <input type="number" class="form-control" placeholder="Number" name="rent_duration_number" value="{{ $contract->rent_duration_number ?? old('rent_duration_number') ?? null }}" required>
            @error('rent_duration_number')
                <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col">
            <select name="rent_duration_period" class="form-control">
                @if(isset($contract))
                    <option value="day(s)" @if($contract->rent_duration_period == "day(s)") selected @endif>Day(s)</option>
                    <option value="week(s)" @if($contract->rent_duration_period == "week(s)") selected @endif>Week(s)</option>
                    <option value="month(s)" @if($contract->rent_duration_period == "month(s)") selected @endif>Month(s)</option>
                    <option value="year(s)" @if($contract->rent_duration_period == "year(s)") selected @endif>Year(s)</option>
                @elseif(old('rent_duration_period'))
                    <option value="day(s)" @if(old('rent_duration_period') == "day(s)") selected @endif>Day(s)</option>
                    <option value="week(s)" @if(old('rent_duration_period') == "week(s)") selected @endif>Week(s)</option>
                    <option value="month(s)" @if(old('rent_duration_period') == "month(s)") selected @endif>Month(s)</option>
                    <option value="year(s)" @if(old('rent_duration_period') == "year(s)") selected @endif>Year(s)</option>
                @else
                    <option value="day(s)">Day(s)</option>
                    <option value="week(s)">Week(s)</option>
                    <option value="month(s)">Month(s)</option>
                    <option value="year(s)">Year(s)</option>
                @endif
            </select>
            @error('rent_duration_period')
                <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="form-group row mb-4">
    <div class="col">
        <label class="control-label">Start Date <span class="text-danger">*</span></label>
        <input type="text" id="startDatepicker" class="form-control flatpickr flatpickr-input active" name="start_date" placeholder="Select Date.." value="{{ $contract->start_date ?? old('start_date') ?? null }}" required>
        @error('start_date')
            <span class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label class="control-label">End Date <span class="text-danger">*</span></label>
        <input type="text" id="endDatepicker" class="form-control flatpickr flatpickr-input active" name="end_date" placeholder="Select Date.." value="{{ $contract->end_date ?? old('end_date') ?? null }}" required>
        @error('end_date')
            <span class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group mb-4">
    <label class="control-label">Payment Term <span class="text-danger">*</span></label>
    <div class="input-group mb-4">
        <select name="payment_term" class="form-control">
            @if(isset($contract))
                <option value="monthly" @if($contract->payment_term == "monthly") selected @endif>Monthly</option>
                <option value="annually" @if($contract->payment_term == "annually") selected @endif>Annually</option>
            @elseif(old('payment_term'))
                <option value="monthly" @if(old('payment_term') == "monthly") selected @endif>Monthly</option>
                <option value="annually" @if(old('payment_term') == "annually") selected @endif>Annually</option>
            @else
                <option value="monthly">Monthly</option>
                <option value="annually">Annually</option>
            @endif
        </select>
        <span class="input-group-addon"><i class="icon-user"></i></span> 
    </div>
    @error('payment_term')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-4 custom-file-container">
    <label>Upload Contract File (Allow Multiple: pdf, image) <span class="text-danger">*</span> </label>
    @if(isset($contract))
        <p class="text-danger">*Uploading new file(s) will replace existing contract file(s)</p>
        <input id="contractFilesInput" name="contract_file[]" type="file" class="file" data-preview-file-type="text" multiple data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
    @else
        <input id="contractFilesInput" name="contract_file[]" type="file" class="file" data-preview-file-type="text" multiple data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
    @endif
    @error('contract_file')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @if(isset($contract))
        @if($contract->contractFiles != null)
            <p class="mt-4 font-weight-bold">Uploaded File:</p>
            <div class="row">
                @foreach ($contract->contractFiles as $file)
                    <div class="col-md-2 col-12 text-center contract-file-wrapper">
                        <a class="link-icon icon-lg" target="_blank" href="{{asset('storage/'.$file->file_path)}}"><p>{{ $file->name }}</p></a>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
    <div class="custom-file-container__image-preview"></div>
</div>
<input type="submit" value="Submit" class="btn btn-primary ml-3 mt-3"> 
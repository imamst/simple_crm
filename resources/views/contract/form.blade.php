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
    <label class="control-label">Tenant's Email <span class="text-danger">*</span></label>
    <div class="input-group"> 
        <div class="input-group-prepend">
            <div class="input-group-text">@</div>
        </div>
        <input type="text" name="tenant_email" class="form-control" value="{{ $contract->tenant->email ?? old('tenant_email') ?? null }}" required> 
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
<div class="form-group mb-4 custom-file-container" data-upload-id="contractFile">
    <label>Upload Contract File (.pdf) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear File">x</a></label>
    <label class="custom-file-container__custom-file">
        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="application/pdf" name="contract_file">
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    @error('contract_file')
        <span class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @if(isset($contract))
        @if($contract->contract_file != null)
            <a class="mt-3" target="_blank" href="{{asset('storage/'.$contract->contract_file)}}"><span class="badge badge-success">Contract FIle Available</span></a>
        @endif
    @endif
    <div class="custom-file-container__image-preview"></div>
</div>
<input type="submit" value="Submit" class="btn btn-primary ml-3 mt-3"> 
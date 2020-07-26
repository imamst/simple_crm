<div class="form-group mb-4">
    <label class="control-label">Contract Number:</label>
    <input type="text" name="contract_number" class="form-control" >
</div>
<div class="form-group mb-4">
    <label class="control-label">Tenant's Email:</label>
    <div class="input-group"> 
        <div class="input-group-prepend">
            <div class="input-group-text">@</div>
        </div>
        <input type="text" name="tenant_email" class="form-control" > 
    </div> 
</div>
<div class="form-group row mb-4">
    <label class="control-label">Rent Duration:</label>
    <div class="col">
        <input type="number" class="form-control" placeholder="Number" name="rent_duration_number">
    </div>
    <div class="col">
        <select name="rent_duration_period" class="form-control">
            <option value="day(s)">Day(s)</option>
            <option value="week(s)">Week(s)</option>
            <option value="month(s)">Month(s)</option>
            <option value="year(s)">Year(s)</option>
        </select>
    </div>
</div>
<div class="form-group row mb-4">
    <div class="col">
        <label class="control-label">Start Date:</label>
        <input type="text" class="form-control flatpickr flatpickr-input" name="start_date" placeholder="Select Date..">
    </div>
    <div class="col">
        <label class="control-label">End Date:</label>
        <input type="text" class="form-control flatpickr flatpickr-input" name="end_date">
    </div>
</div>
<div class="form-group mb-4">
    <label class="control-label">Payment Term:</label>
    <div class="input-group mb-4">
        <select name="payment_term" class="form-control">
            <option value="monthly">Monthly</option>
            <option value="annually">Annually</option>
        </select>
        <span class="input-group-addon"><i class="icon-user"></i></span> 
    </div>
</div>
<div class="form-group mb-4">
    <label class="control-label">Contract File:</label>
    <div class="custom-file mb-4">
        <input type="file" class="custom-file-input" name="contract_file" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
</div>
<input type="submit" value="Submit" class="btn btn-primary ml-3 mt-3"> 
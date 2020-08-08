@extends('layouts.authentication')

@section('title')
    Customer Information Form
@endsection

@section('styles')
<link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="form-content">

    <h1 class="">Customer Information Form</h1>
    <form class="text-left" action="{{route('tenants.update', $tenant->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form">

            @include('tenant.form')

            <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </div>
    </form>

</div>  
@endsection

@push('scripts')
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script src="{{asset('plugins/mask-money/jquery.maskMoney.js')}}"></script>
<script>
    var photoUpload = new FileUploadWithPreview('photoFile');
    $("#income").maskMoney({

        // The symbol to be displayed before the value entered by the user
        prefix:'SAR ', 

        // The suffix to be displayed after the value entered by the user(example: "1234.23 €"). 
        suffix: "",

        // Delay formatting of text field until focus leaves the field
        formatOnBlur: false,

        // Prevent users from inputing zero
        allowZero:false, 

        // Prevent users from inputing negative values
        allowNegative:true, 

        // Allow empty input values, so that when you delete the number it doesn't reset to 0.00. 
        allowEmpty: false,

        // Select text in the input on double click
        doubleClickSelection: true, 

        // Select all text in the input when the element fires the focus event. 
        selectAllOnFocus: false,

        // The thousands separator
        thousands: ',', 

        // The decimal separator
        decimal: '.' , 

        // How many decimal places are allowed
        precision: 0, 

        // Set if the symbol will stay in the field after the user exits the field. 
        affixesStay : false, 

        // Place caret at the end of the input on focus 
        bringCaretAtEndOnFocus: true 

    });
</script>
@endpush
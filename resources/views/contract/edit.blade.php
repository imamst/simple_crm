@extends('layouts.app')

@section('title')
    Edit Contract Data
@endsection

@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
<link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Contract Data</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content-area br-4">
                    <div class="widget-one">
                        <form class="form-vertical" method="POST" action="{{route('contracts.update',$contract->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        @include('contract.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script>
    var f1 = flatpickr(document.getElementById('startDatepicker'));
    var f2 = flatpickr(document.getElementById('endDatepicker'));
    var contractUpload = new FileUploadWithPreview('contractFile');
</script>
@endpush
@extends('layouts.authentication')

@section('title')
    Tenant's Information Form
@endsection

@section('styles')
<link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="form-content">

    <h1 class="">Tenant's Information Form</h1>
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
<script>
    var contractUpload = new FileUploadWithPreview('photoFile');
</script>
@endpush
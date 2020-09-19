@extends('layouts.app')

@section('title')
    Contract Information
@endsection

@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
<link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="layout-px-spacing">

    <div class="row layout-spacing">

        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

            <div class="layout-spacing ">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between mb-3">
                        <h3>Contract Information</h3>
                        <a href="{{route('contracts.edit', $contract->id)}}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Contract No.</td>
                                <td>:</td>
                                <td>{{$contract->contract_number}}</td>
                            </tr>
                            <tr>
                                <td>Agent</td>
                                <td>:</td>
                                <td>{{$contract->agent->full_name}}</td>
                            </tr>
                            <tr>
                                <td>Rent Duration</td>
                                <td>:</td>
                                <td>{{$contract->rent_duration}}</td>
                            </tr>
                            <tr>
                                <td>Period</td>
                                <td>:</td>
                                <td>{{$contract->period}}</td>
                            </tr>
                            <tr>
                                <td>Payment Term</td>
                                <td>:</td>
                                <td class="text-capitalize">{{$contract->payment_term}}</td>
                            </tr>
                            <tr>
                                <td>Contract File</td>
                                <td>:</td>
                                <td>
                                    @if($contract->contractFiles != null)
                                        @foreach ($contract->contractFiles as $file)
                                            <p><a class="link-icon" target="_blank" href="{{asset('storage/'.$file->file_path)}}">{{ $file->name }}</a><p>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>                                
            </div>

        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('plugins/simple-money-format/simple.money.format.js')}}"></script>
<script>
    $('.money').simpleMoneyFormat();
</script>
@endpush
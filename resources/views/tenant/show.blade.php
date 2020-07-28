@extends('layouts.app')

@section('title')
    Tenant's Information
@endsection

@section('styles')
<link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="layout-px-spacing">

    <div class="row layout-spacing">

        <!-- Content -->
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">Info</h3>
                        <a href="{{route('tenants.edit',$tenant->id)}}" class="mt-2 edit-profile" style="visibility: hidden;"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                    </div>
                    <div class="text-center user-info">
                        @if($tenant->photo != null)
                            <img src="{{asset('storage/'.$tenant->photo)}}" alt="avatar">
                        @else
                            <img src="{{asset('storage/img/90x90.jpg')}}" alt="avatar">
                        @endif
                        <p class="">{{$tenant->full_name}}</p>
                    </div>
                    <div class="user-info-list">

                        <div class="">
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>{{ $tenant->profession }}
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>{{ $tenant->company }}
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>SAR <span class="money">{{ $tenant->income }}</span>
                                </li>
                                <li class="contacts-block__item">
                                    <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{ $tenant->email }}</a>
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>{{$tenant->phone_number}}
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>{{ $tenant->address }}
                                </li>
                            </ul>
                        </div>                                    
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

            <div class="layout-spacing ">
                <div class="widget-content widget-content-area">
                    <h3 class="">Contract Information</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Contract No.</td>
                                <td>:</td>
                                <td>{{$tenant->contract->contract_number}}</td>
                            </tr>
                            <tr>
                                <td>Agent</td>
                                <td>:</td>
                                <td>{{$tenant->contract->agent->full_name}}</td>
                            </tr>
                            <tr>
                                <td>Rent Duration</td>
                                <td>:</td>
                                <td>{{$tenant->contract->rent_duration}}</td>
                            </tr>
                            <tr>
                                <td>Period</td>
                                <td>:</td>
                                <td>{{$tenant->contract->period}}</td>
                            </tr>
                            <tr>
                                <td>Payment Term</td>
                                <td>:</td>
                                <td class="text-capitalize">{{$tenant->contract->payment_term}}</td>
                            </tr>
                            <tr>
                                <td>Contract File</td>
                                <td>:</td>
                                <td>
                                    @if($tenant->contract->contract_file)
                                        <a href="{{asset('storage/'.$tenant->contract->contract_file)}}"><span class="badge badge-success">Download</span></a>
                                    @else
                                        <span class="text-danger">Unavailable</span>
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
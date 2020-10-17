@extends('layouts.app')

@section('title')
    Agent Information
@endsection

@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
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
                        <h3 class="">Agent Info</h3>
                        <a href="{{route('agents.edit',$agent->national_id)}}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                    </div>
                    <div class="text-center user-info">
                        @if($agent->avatar != null)
                            <img src="{{asset('storage/'.$agent->avatar)}}" alt="avatar">
                        @else
                            <img src="{{asset('storage/img/90x90.jpg')}}" alt="avatar">
                        @endif
                        <p class="">{{$agent->full_name}}</p>
                    </div>
                    <div class="user-info-list">

                        <div class="">
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>{{ $agent->national_id }}
                                </li>
                                <li class="contacts-block__item">
                                    <a href="mailto:{{ $agent->email }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{ $agent->email }}</a>
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>{{$agent->phone_number}}
                                </li>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>{{ $agent->address }}
                                </li>
                            </ul>
                        </div>                                    
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

            <div class="widget widget-activity-three widget-activity-four">

                <div class="widget-heading">
                    <h5>Recent Agent Contracts</h5>
                </div>

                <div class="widget-content">

                    <div class="mt-container mx-auto">
                        <div class="timeline-line">
                            @foreach($recent_contracts as $contract)
                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5><a class="text-secondary" href="{{route('tenants.show',$contract->tenant->id)}}"> Contract No. {{ $contract->contract_number }}</a></h5>
                                        <span class="">Created: {{ $contract->input_date }}</span>
                                    </div>
                                    <p>Customer Name: {{ $contract->tenant->full_name }}</p>
                                    <p>Rent Duration: {{ $contract->rent_duration }}</p>
                                    <p>Contract Files: </p>
                                    <div class="tags">
                                        @if($contract->contractFiles != null)
                                            @foreach ($contract->contractFiles as $file)
                                                <p><a class="link-icon" target="_blank" href="{{asset('storage/'.$file->file_path)}}">{{ $file->name }}</a><p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach                                
                        </div>                                    
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{route('agents.contracts.index', $agent->national_id)}}" class="btn btn-primary">View More Detail <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
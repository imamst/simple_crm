@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
@endsection

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-five">
                <div class="widget-content">

                    <div class="header">
                        <div class="header-body">
                            <h6>Contract Statistics</h6>
                            <p class="meta-date">Until {{ date("M Y") }}</p>
                        </div>
                        <div class="task-action">
                            <div class="dropdown  custom-dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                    <a class="dropdown-item" href="{{route('contracts.create')}}">Add</a>
                                    <a class="dropdown-item" href="{{route('contracts.index')}}">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">
                        <div class="mb-4">
                            <p class="task-left">{{ $total_contracts }}</p>
                            <p class="task-completed"><span>Total Contract(s)</span> signed</p>
                        </div>
                        <a href="{{route('contracts.create')}}" class="btn btn-success">Input New Contract</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-three widget-activity-four">

                <div class="widget-heading">
                    <h5>Recent Contracts</h5>
                </div>

                <div class="widget-content">

                    <div class="mt-container mx-auto">
                        <div class="timeline-line">
                            @if(count($recent_contracts)>0)
                                @foreach($recent_contracts as $contract)
                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5><a class="text-success" href="{{ route('contracts.show',$contract->id) }}">Contract No. {{ $contract->contract_number }}</a></h5>
                                            <span class="">Created: {{ $contract->input_date }}</span>
                                        </div>
                                        <p>Customer: {{ $contract->tenant->full_name }}</p>
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
                            @else
                                <p class="text-center">Records is empty</p>
                            @endif
                        </div>                                    
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{route('contracts.index')}}" class="btn btn-primary">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
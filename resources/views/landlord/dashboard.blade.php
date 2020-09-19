@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('styles')
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/elements/alert.css')}}">
<link href="{{asset('assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_custom.css')}}">
<style>
    .table > tbody > tr > td {
        color: #000;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            @if(session('success'))
                <div class="alert alert-success mb-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                    {{session('success')}}</button>
                </div> 
            @endif
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Contracts Data</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table id="style-2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Contract no.</th>
                                    <th class="text-center">Action</th>
                                    <th>Customer Email</th>
                                    <th>Agent</th>
                                    <th>Duration</th>
                                    <th>Period</th>
                                    <th>Payment Term</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contracts as $contract)
                                    <tr>
                                        <td><a class="text-secondary" href="{{route('tenants.show',$contract->tenant->id)}}">{{ $contract->contract_number }}</a></td>
                                        <td class="text-center">
                                            <a href="{{route('tenants.request', $contract->tenant->id)}}" data-toggle="tooltip" data-placement="top" title="Send Information Request to Customer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation text-success"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                                            </a>
                                        </td>
                                        <td class="user-name">{{ $contract->tenant->email }}</td>
                                        <td class="user-name">{{ $contract->agent->full_name }}</td>
                                        <td>{{ $contract->rent_duration }}</td>
                                        <td>{{ $contract->period }}</td>
                                        <td><span class="text-capitalize">{{ $contract->payment_term }}</span></td>
                                        <td class="text-center">
                                            @if($contract->tenant->data_status == 2)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-success"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                <span class="ml-2 text-success">Collected</span>
                                            @elseif($contract->tenant->data_status == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation text-warning"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                                            <span class="ml-2 text-warning">Request Sent</span>
                                            @else
                                                <span>-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-top-spacing">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-five">
                <div class="widget-content">
                    <div class="header">
                        <div class="header-body">
                            <h6>Customer Information Statistics</h6>
                            <p class="meta-date">Until {{ date("M Y") }}</p>
                        </div>
                        <div class="task-action">
                            <div class="dropdown  custom-dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                    <a class="dropdown-item" href="{{route('tenants.index')}}">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">
                        <div class="mb-4">
                            <p class="task-left">{{ $total_tenants }}</p>
                            <p class="task-completed"><span>Total Customer information</span> collected</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-three widget-activity-four">

                <div class="widget-heading">
                    <h5>Recent Collected Customer Information</h5>
                </div>

                <div class="widget-content">

                    <div class="mt-container mx-auto">
                        <div class="timeline-line">
                            @if(count($recent_tenants)>0)
                                @foreach($recent_tenants as $tenant)
                                <div class="item-timeline timeline-new">
                                    <div class="t-dot">
                                        {{-- <div style="background-image: url({{asset('storage/'.$tenant->photo)}}); background-size: cover; background-position: center"></div> --}}
                                        <div class="t-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        </div>
                                    </div>
                                    <div class="t-content">
                                        <div class="t-uppercontent">
                                            <h5><a href="{{route('tenants.show',$tenant->id)}}">{{ $tenant->full_name }}</a></h5>
                                            <span class="">Submitted: {{ $tenant->input_date }}</span>
                                        </div>
                                        <p>Email: {{ $tenant->email }}</p>
                                        <p>Phone: {{ $tenant->phone_number }}</p>
                                        <div class="tags">
                                            <div class="badge badge-success">Contract No. {{ $tenant->contract->contract_number }}</div>
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
                        <a href="{{route('tenants.index')}}" class="btn btn-primary">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script>
    c2 = $('#style-2').DataTable({
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5 
    });

    multiCheck(c2);

    $('[data-toggle="tooltip"]').tooltip()
</script>
@endpush
@extends('layouts.app')

@section('title')
    Dashboard
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
                                        <p class="meta-date">Until Nov 2019</p>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown  custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                                <a class="dropdown-item" href="javascript:void(0);">Add</a>
                                                <a class="dropdown-item" href="javascript:void(0);">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="mb-4">
                                        <p class="task-left">8</p>
                                        <p class="task-completed"><span>Total Contract</span> signed</p>
                                    </div>
                                    <a href="#" class="btn btn-success">Input New Contract</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-three widget-activity-four">

                            <div class="widget-heading">
                                <h5>Recent Contract</h5>
                            </div>

                            <div class="widget-content">

                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        
                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Contract Number</h5>
                                                    <span class="">Created: 27 Feb, 2020</span>
                                                </div>
                                                <p>Rent Duration</p>
                                                <div class="tags">
                                                    <div class="badge badge-success"><a href="#">Contract File</a></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Mail</h5>
                                                    <span class="">28 Feb, 2020</span>
                                                </div>
                                                <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></p>
                                                <div class="tags">
                                                    <div class="badge badge-primary">Admin</div>
                                                    <div class="badge badge-success">HR</div>
                                                    <div class="badge badge-warning">Mail</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Task Completed</h5>
                                                    <span class="">01 Mar, 2020</span>
                                                </div>
                                                <p>Backup <span>Files EOD</span></p>
                                                <div class="tags">
                                                    <div class="badge badge-primary">Backup</div>
                                                    <div class="badge badge-success">EOD</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Collect Docs</h5>
                                                    <span class="">10 Mar, 2020</span>
                                                </div>
                                                <p>Collected documents from <a href="javascript:void(0);">Sara</a></p>
                                                <div class="tags">
                                                    <div class="badge badge-success">Collect</div>
                                                    <div class="badge badge-warning">Docs</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Reboot</h5>
                                                    <span class="">06 Apr, 2020</span>
                                                </div>
                                                <p>Server rebooted successfully</p>
                                                <div class="tags">
                                                    <div class="badge badge-warning">Reboot</div>
                                                    <div class="badge badge-primary">Server</div>
                                                </div>
                                            </div>
                                        </div>                                      
                                    </div>                                    
                                </div>

                                <div class="text-center mt-3">
                                    <a class="btn btn-primary">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

@endsection
<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image" style="visibility: hidden;background:#fff;"></figure>
            <div class="user-info">
                <img src="{{asset('storage/img/90x90.jpg')}}" alt="avatar">
                <h6 class="">{{ Auth::user()->full_name }}</h6>
                @auth('web')
                    <p class="text-capitalize">Landlord</p>
                @endauth
                @auth('agent')
                    <p class="text-capitalize">Agent</p>
                @endauth
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">

            {{-- Landlord --}}
            @auth('web')
            <li class="menu {{($menu == 'dashboard') ? 'active' : ''}}">
                <a href="{{url('dashboard/landlord')}}" aria-expanded="{{($menu == 'dashboard') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span> Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu {{($menu == 'tenants') ? 'active' : ''}}">
                <a href="{{route('tenants.index')}}" aria-expanded="{{($menu == 'tenants') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span> Tenants</span>
                    </div>
                </a>
            </li>
            @endauth

            {{-- Agent --}}
            @auth('agent')
            <li class="menu {{($menu == 'dashboard') ? 'active' : ''}}">
                <a href="{{url('dashboard/agent')}}" aria-expanded="{{($menu == 'dashboard') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span> Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu {{($menu == 'contracts') ? 'active' : ''}}">
                <a href="#contractMenu" data-toggle="collapse" aria-expanded="{{($menu == 'contracts') ? 'true' : 'false'}}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <span> Contracts</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="contractMenu" data-parent="#accordionExample">
                    <li>
                        <a href="{{route('contracts.index')}}"> View All </a>
                    </li>
                    <li>
                        <a href="{{route('contracts.create')}}"> Add New </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
        
    </nav>

</div>
<!--  END SIDEBAR  -->
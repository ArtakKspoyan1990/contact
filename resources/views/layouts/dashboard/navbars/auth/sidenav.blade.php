<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="javascript:void(0)">
            <img src="{{ asset('argon/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Any Card</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if(Auth::getDefaultDriver() == 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.companies' ? 'active' : '' }}"
                       href="{{ route('admin.companies') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Companies</span>
                    </a>
                </li>
            @endif
            @if(Auth::getDefaultDriver() == 'company_user')
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'company.contacts' ? 'active' : '' }}"
                       href="{{ route('company.contacts') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-box-2 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Contacts</span>
                    </a>
                </li>
                @if(Auth::guard('company_user')->user()->isBigCompany())
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'company.companies' ? 'active' : '' }}"
                               href="{{ route('company.companies') }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-building text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Companies</span>
                            </a>
                        </li>
                @endif

                    @if(Auth::guard('company_user')->user()->isBigCompany() or Auth::guard('company_user')->user()->isCompany())
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'company.employees' ? 'active' : '' }}"
                               href="{{ route('company.employees') }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Employees</span>
                            </a>
                        </li>
                    @endif
            @endif
                <li class="nav-item">
                    <form role="form" method="post" action="{{ Auth::getDefaultDriver() == 'company_user' ? route('company.logout') : route('admin.logout') }}" id="logout-form">
                        @csrf
                        <input type="hidden" name="type" value="{{ Auth::getDefaultDriver() == 'company_user' ? 'company' : 'admin' }}">
                        <a href="{{ Auth::getDefaultDriver() == 'company_user' ? route('company.logout') : route('admin.logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="nav-link">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-button-power text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Log out</span>
                        </a>
                    </form>
                </li>



            {{--<li class="nav-item">--}}
                {{--<a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">--}}
                    {{--<div--}}
                        {{--class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
                        {{--<i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>--}}
                    {{--</div>--}}
                    {{--<span class="nav-link-text ms-1">Dashboard</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item mt-3 d-flex align-items-center">--}}
                {{--<div class="ps-4">--}}
                    {{--<i class="fab fa-laravel" style="color: #f4645f;"></i>--}}
                {{--</div>--}}
                {{--<h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Laravel Examples</h6>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">--}}
                    {{--<div--}}
                        {{--class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
                        {{--<i class="ni ni-single-02 text-dark text-sm opacity-10"></i>--}}
                    {{--</div>--}}
                    {{--<span class="nav-link-text ms-1">Profile</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="nav-item mt-3">--}}
                {{--<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages</h6>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'tables']) }}">--}}
                    {{--<div--}}
                        {{--class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
                        {{--<i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>--}}
                    {{--</div>--}}
                    {{--<span class="nav-link-text ms-1">Tables</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link {{  str_contains(request()->url(), 'billing') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'billing']) }}">--}}
                    {{--<div--}}
                        {{--class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
                        {{--<i class="ni ni-credit-card text-success text-sm opacity-10"></i>--}}
                    {{--</div>--}}
                    {{--<span class="nav-link-text ms-1">Billing</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link {{ Route::currentRouteName() == 'virtual-reality' ? 'active' : '' }}" href="{{ route('virtual-reality') }}">--}}
                    {{--<div--}}
                        {{--class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
                        {{--<i class="ni ni-app text-info text-sm opacity-10"></i>--}}
                    {{--</div>--}}
                    {{--<span class="nav-link-text ms-1">Virtual Reality</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link {{ Route::currentRouteName() == 'rtl' ? 'active' : '' }}" href="{{ route('rtl') }}">--}}
                    {{--<div--}}
                        {{--class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
                        {{--<i class="ni ni-world-2 text-danger text-sm opacity-10"></i>--}}
                    {{--</div>--}}
                    {{--<span class="nav-link-text ms-1">RTL</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item mt-3">--}}
                {{--<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link {{ Route::currentRouteName() == 'profile-static' ? 'active' : '' }}" href="{{ route('profile-static') }}">--}}
                    {{--<div--}}
                        {{--class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
                        {{--<i class="ni ni-single-02 text-dark text-sm opacity-10"></i>--}}
                    {{--</div>--}}
                    {{--<span class="nav-link-text ms-1">Profile</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link " href="{{ route('sign-in-static') }}">--}}
                    {{--<div--}}
                        {{--class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
                        {{--<i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>--}}
                    {{--</div>--}}
                    {{--<span class="nav-link-text ms-1">Sign In</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link " href="{{ route('sign-up-static') }}">--}}
                    {{--<div--}}
                        {{--class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
                        {{--<i class="ni ni-collection text-info text-sm opacity-10"></i>--}}
                    {{--</div>--}}
                    {{--<span class="nav-link-text ms-1">Sign Up</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
    </div>
</aside>

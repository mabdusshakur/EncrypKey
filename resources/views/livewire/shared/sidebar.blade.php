<div>
    <aside class="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="logo-icon">
                <img src="{{ asset('assets/images/logo_circle_no_bg.png') }}" class="logo-img" alt="">
            </div>
            <div class="logo-name flex-grow-1">
                <h5 class="mb-0">EncrypKey</h5>
            </div>
        </div>
        <div class="sidebar-nav" data-simplebar="true">
            <ul class="metismenu" id="sidenav">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-secondary' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <div class="menu-title">Dashboard</div>
                </a>
                <a href="{{ route('applications') }}" class="{{ request()->routeIs('applications') ? 'bg-secondary' : '' }}">
                    <i class="fa-solid fa-box"></i>
                    <div class="menu-title">Applications</div>
                </a>
            </ul>
        </div>
    </aside>
</div>

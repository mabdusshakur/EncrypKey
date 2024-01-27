<div>
    <header class="top-header">
        <nav class="navbar navbar-expand align-items-center gap-4 d-flex justify-content-between">
            <div class="btn-toggle">
                <a href="javascript:;"><i class="fa-solid fa-bars"></i></a>
            </div>

            <ul class="navbar-nav gap-1 nav-right-links align-items-center">
                <li class="nav-item dropdown">
                    <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/images/avatars/01.png') }}" class="rounded-circle p-1 border"
                            width="45" height="45">
                    </a>
                    <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                        <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/avatars/01.png') }}"
                                    class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                                    alt="">
                                <h5 class="user-name mb-0 fw-bold">Hello, Jhon</h5>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;">
                            <i class="fa-regular fa-circle-user"></i>   
                            Profile
                        </a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;">
                            <i class="fa-solid fa-power-off"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
</div>

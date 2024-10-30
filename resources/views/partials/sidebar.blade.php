<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            {{-- <img src="{{ asset('template/assets/img/logo-ct-dark.png" class="navbar-brand-img') }}" width="26" height="26" alt="main_logo"> --}}
            <span class="ms-1 text-sm text-dark">PROJECT MANAGEMENT</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                    href="{{ route('dashboard') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (auth()->check() && auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('jenisProject.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                        href="{{ route('jenisProject.index') }}">
                        <i class="material-symbols-rounded opacity-5">filter_alt</i>
                        <span class="nav-link-text ms-1">Jenis Project</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('members.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                        href="{{ route('members.index') }}">
                        <i class="material-symbols-rounded opacity-5">groups</i>
                        <span class="nav-link-text ms-1">Members</span>
                    </a>
                </li>
                @endif
                 @if (auth()->check() && auth()->user()->role === 'admin' ||auth()->check() && auth()->user()->role === 'karyawan')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('projects.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                        href="{{ route('projects.index') }}">
                        <i class="material-symbols-rounded opacity-5">receipt_long</i>
                        <span class="nav-link-text ms-1">Project</span>
                    </a>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('client.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                            href="{{ route('client.index') }}">
                            <i class="material-symbols-rounded opacity-5">groups</i>
                            <span class="nav-link-text ms-1">Clients</span>
                        </a>
                    </li>
                </li>
                @endif
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('profile.index') }}">
                    <i class="material-symbols-rounded opacity-5">person</i>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                @guest
                    <a class="nav-link text-dark" href="{{ route('auth.login') }}">
                        <i class="material-symbols-rounded opacity-5">login</i>
                        <span class="nav-link-text ms-1">Sign In</span>
                    </a>
                </li>
                <li class="nav-item">
                @else
                    <a class="nav-link text-dark" href="{{ route('auth.logout') }}">
                        <i class="material-symbols-rounded opacity-5">logout</i>
                        <span class="nav-link-text ms-1">Sign Out</span>
                    </a>
                @endguest
            </li>
        </ul>
    </div>
</aside>


{{-- <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('projects.index') ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ route('member.projects.index') }}">
            <i class="material-symbols-rounded opacity-5">receipt_long</i>
            <span class="nav-link-text ms-1">Members Project</span>
          </a>
        </li> --}}

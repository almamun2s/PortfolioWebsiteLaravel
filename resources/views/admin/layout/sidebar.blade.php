<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}" target="_blank">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-a"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Portfolio</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">Pages</div>
    @canany(['home.banner', 'home.welcome', 'home.service', 'home.process', 'home.portfolio'])
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item
        @if (request()->routeIs('admin.home.banner') ||
                request()->routeIs('admin.home.welcome') ||
                request()->routeIs('admin.home.service') ||
                request()->routeIs('admin.home.process') ||
                request()->routeIs('admin.home.portfolio')) {{ 'active' }} @endif
    ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#home" aria-expanded="true"
                aria-controls="home">
                <i class="fas fa-house"></i>
                <span>Home</span>
            </a>
            <div id="home" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Home page:</h6>
                    @can('home.banner')
                        <a class="collapse-item" href="{{ route('admin.home.banner') }}">Banner</a>
                    @endcan
                    @can('home.welcome')
                        <a class="collapse-item" href="{{ route('admin.home.welcome') }}">Welcome</a>
                    @endcan
                    @can('home.service')
                        <a class="collapse-item" href="{{ route('admin.home.service') }}">Service</a>
                    @endcan
                    @can('home.process')
                        <a class="collapse-item" href="{{ route('admin.home.process') }}">Process</a>
                    @endcan
                    @can('home.portfolio')
                        <a class="collapse-item" href="{{ route('admin.home.portfolio') }}">Portfolio</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany

    @can('portfolio.show')
        <!-- Nav Item - Portfolios -->
        <li class="nav-item
            @if (request()->routeIs('admin.portfolios.index') ||
                    request()->routeIs('admin.portfolios.create') ||
                    request()->routeIs('admin.portfolios.edit')) active @endif
            ">
            <a class="nav-link" href="{{ route('admin.portfolios.index') }}">
                <i class="fas fa-briefcase"></i>
                <span>Portfolio</span></a>
        </li>
    @endcan

    @canany(['about', 'about.status.show', 'about.social.show'])
        <li class="nav-item 
            @if (request()->routeIs('admin.about.index') ||
                    request()->routeIs('admin.status.index') ||
                    request()->routeIs('admin.status.edit') ||
                    request()->routeIs('admin.socials.edit') ||
                    request()->routeIs('admin.socials.index')) active @endif
            ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about" aria-expanded="true"
                aria-controls="about">
                <i class="fas fa-address-card"></i>
                <span>About</span>
            </a>
            <div id="about" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">About page:</h6>
                    @can('about')
                        <a class="collapse-item" href="{{ route('admin.about.index') }}">About Page</a>
                    @endcan
                    @can('about.status.show')
                        <a class="collapse-item" href="{{ route('admin.status.index') }}">My Status</a>
                    @endcan
                    @can('about.social.show')
                        <a class="collapse-item" href="{{ route('admin.socials.index') }}">Social Links</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany


    @can('message.show')
        <!-- Nav Item - Contact -->
        <li class="nav-item 
    @if (request()->routeIs('admin.contact.index') || request()->routeIs('admin.contact.details')) active @endif
    ">
            <a class="nav-link" href="{{ route('admin.contact.index') }}">
                <i class="fas fa-address-book"></i>
                <span>Contact</span></a>
        </li>
    @endcan

    @can('category.show')
        <div class="sidebar-heading">Categories</div>
        <!-- Nav Item - Category -->
        <li class="nav-item 
        @if (request()->routeIs('admin.categories.index') ||
                request()->routeIs('admin.categories.create') ||
                request()->routeIs('admin.categories.edit')) active @endif
    ">
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                <i class="fa-solid fa-layer-group"></i>
                <span>Category</span></a>
        </li>
    @endcan

    @canany(['user,show', 'role.show', 'permission'])
        <div class="sidebar-heading">Settings</div>
    @endcanany
    @can('user.show')
        <!-- Nav Item - User -->
        <li class="nav-item @if (request()->routeIs('admin.users.index') || request()->routeIs('admin.users.edit')) active @endif">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="fas fa-user"></i>
                <span>Users</span></a>
        </li>
    @endcan

    @canany(['role.show', 'permission'])
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item
            @if (request()->routeIs('admin.roles.index') ||
                    request()->routeIs('admin.roles.create') ||
                    request()->routeIs('admin.roles.edit') ||
                    request()->routeIs('admin.permissions.index') ||
                    request()->routeIs('admin.permissions.create') ||
                    request()->routeIs('admin.permissions.edit')) active @endif
            ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#roles" aria-expanded="true"
                aria-controls="roles">
                <i class="fas fa-key"></i>
                <span>Role</span>
            </a>
            <div id="roles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('role.show')
                        <a class="collapse-item" href="{{ route('admin.roles.index') }}">Roles</a>
                    @endcan
                    @can('permission')
                        <a class="collapse-item" href="{{ route('admin.permissions.index') }}">Permissions</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->

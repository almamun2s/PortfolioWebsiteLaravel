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
    @canany([App\Enum\Permissions::HOME_BANNER->value, App\Enum\Permissions::HOME_WELCOME->value,
        App\Enum\Permissions::HOME_SERVICE->value, App\Enum\Permissions::HOME_PROCESS->value,
        App\Enum\Permissions::HOME_PORTFOLIO->value])
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
                    @can(App\Enum\Permissions::HOME_BANNER->value)
                        <a class="collapse-item" href="{{ route('admin.home.banner') }}">Banner</a>
                    @endcan
                    @can(App\Enum\Permissions::HOME_WELCOME->value)
                        <a class="collapse-item" href="{{ route('admin.home.welcome') }}">Welcome</a>
                    @endcan
                    @can(App\Enum\Permissions::HOME_SERVICE->value)
                        <a class="collapse-item" href="{{ route('admin.home.service') }}">Service</a>
                    @endcan
                    @can(App\Enum\Permissions::HOME_PROCESS->value)
                        <a class="collapse-item" href="{{ route('admin.home.process') }}">Process</a>
                    @endcan
                    @can(App\Enum\Permissions::HOME_PORTFOLIO->value)
                        <a class="collapse-item" href="{{ route('admin.home.portfolio') }}">Portfolio</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany

    @can(App\Enum\Permissions::PORTFOLIO_SHOW->value)
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

    @canany([App\Enum\Permissions::ABOUT->value, App\Enum\Permissions::STATUS_SHOW->value,
        App\Enum\Permissions::SOCIAL_SHOW->value])
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
                    @can(App\Enum\Permissions::ABOUT->value)
                        <a class="collapse-item" href="{{ route('admin.about.index') }}">About Page</a>
                    @endcan
                    @can(App\Enum\Permissions::STATUS_SHOW->value)
                        <a class="collapse-item" href="{{ route('admin.status.index') }}">My Status</a>
                    @endcan
                    @can(App\Enum\Permissions::SOCIAL_SHOW->value)
                        <a class="collapse-item" href="{{ route('admin.socials.index') }}">Social Links</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany


    @can(App\Enum\Permissions::MESSAGE_SHOW->value)
        <!-- Nav Item - Contact -->
        <li class="nav-item 
    @if (request()->routeIs('admin.contact.index') || request()->routeIs('admin.contact.details')) active @endif
    ">
            <a class="nav-link" href="{{ route('admin.contact.index') }}">
                <i class="fas fa-address-book"></i>
                <span>Contact</span></a>
        </li>
    @endcan

    @can(App\Enum\Permissions::CATEGORY_SHOW->value)
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

    @can(App\Enum\Permissions::MEDIA_SHOW->value)
        <div class="sidebar-heading">Media</div>
        <!-- Nav Item - Category -->
        <li class="nav-item {{ request()->routeIs('admin.media.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.media.index') }}">
                <i class="fa-solid fa-photo-film"></i>
                <span>Uploads</span></a>
        </li>
    @endcan

    @canany([App\Enum\Permissions::USER_SHOW->value, App\Enum\Permissions::ROLE_SHOW->value,
        App\Enum\Permissions::PERMISSION->value])
        <div class="sidebar-heading">Settings</div>
    @endcanany
    @can(App\Enum\Permissions::USER_SHOW->value)
        <!-- Nav Item - User -->
        <li class="nav-item @if (request()->routeIs('admin.users.index') || request()->routeIs('admin.users.edit')) active @endif">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="fas fa-user"></i>
                <span>Users</span></a>
        </li>
    @endcan

    @can(App\Enum\Permissions::ROLE_SHOW->value)
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item
            @if (request()->routeIs('admin.roles.index') ||
                    request()->routeIs('admin.roles.create') ||
                    request()->routeIs('admin.roles.edit')) active @endif
            ">
            <a href="{{ route('admin.roles.index') }}" class="nav-link">
                <i class="fas fa-key"></i>
                <span>Roles</span>
            </a>

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

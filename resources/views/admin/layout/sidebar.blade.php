<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-a"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Portfolio</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">Pages</div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#home"
            aria-expanded="true" aria-controls="home">
            <i class="fas fa-house"></i>
            <span>Home</span>
        </a>
        <div id="home" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Home page:</h6>
                <a class="collapse-item" href="{{ route('admin.home.banner') }}">Banner</a>
                <a class="collapse-item" href="cards.html">Welcome</a>
                <a class="collapse-item" href="cards.html">Service</a>
                <a class="collapse-item" href="cards.html">Process</a>
                <a class="collapse-item" href="cards.html">Portfolio</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#portfolio"
            aria-expanded="true" aria-controls="portfolio">
            <i class="fas fa-briefcase"></i>
            <span>Portfolio</span>
        </a>
        <div id="portfolio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Portfolio page:</h6>
                <a class="collapse-item" href="buttons.html">Portfolio</a>
                <a class="collapse-item" href="buttons.html">Portfolio Details</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about"
            aria-expanded="true" aria-controls="about">
            <i class="fas fa-address-card"></i>
            <span>About</span>
        </a>
        <div id="about" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">About page:</h6>
                <a class="collapse-item" href="buttons.html">About</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contact"
            aria-expanded="true" aria-controls="contact">
            <i class="fas fa-address-book"></i>
            <span>Contact</span>
        </a>
        <div id="contact" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Contact page:</h6>
                <a class="collapse-item" href="buttons.html">Contact</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->

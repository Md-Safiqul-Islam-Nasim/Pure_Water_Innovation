<!-- Get all notifications -->
@php
$notifications = App\Models\Notification::all();
@endphp
<div class="main-panel">
    <div class="main-header">
        <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="../index.html" class="logo">
                    <img src="backend/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                        height="20" />
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
                <!-- Search Bar for Large Screens -->
                <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pe-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input type="text" placeholder="Search ..." class="form-control" />
                    </div>
                </nav>
                <!-- Navbar Right Section -->
                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

                    <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false" aria-haspopup="true">
                            <i class="fa fa-search"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-search animated fadeIn">
                            <form class="navbar-left navbar-form nav-search">
                                <div class="input-group">
                                    <input type="text" placeholder="Search ..." class="form-control" />
                                </div>
                            </form>
                        </ul>
                    </li>

                    <!-- Notifications -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2" style="width: 400px; height: 370px;overflow-y: scroll;">
                            @if (isset($notifications) && !$notifications->isEmpty())
                            @foreach ($notifications as $notification)
                            <li class="dropdown-item d-flex justify-content-between align-items-center px-2 py-1 border-bottom">
                                <div>
                                    <p class="mb-0 text-truncate" style="max-width: 180px;"><strong>{{ $notification->title }}</strong></p>
                                    <p class="mb-0 text-muted small text-truncate" style="max-width: 250px;">{{ $notification->message }}</p>
                                </div>
                                <span class="text-muted small">{{ $notification->created_at->diffForHumans() }}</span>
                            </li>
                            @endforeach
                            @else
                            <li class="dropdown-item text-muted text-center small">No notifications yet!</li>
                            @endif
                        </ul>
                    </li>


                    <!-- User Profile -->
                    <li class="nav-item topbar-user dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset(Auth::user()->photo)}}" alt="Profile" class="avatar-img rounded-circle me-2"
                                style="width: 35px; height: 35px;">
                            <span class="fw-bold">Hi, {{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <li class="mb-3 text-center dropdown-header">
                                <!-- Profile Image Section -->
                                <div class="d-flex flex-column align-items-center">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <img src="{{ asset(Auth::user()->photo)}}" alt="Profile" class="rounded-circle"
                                            style="width: 60px; height: 60px;">
                                    </div>
                                    <h6 class="mb-0 fw-bold">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </div>
                            </li>

                            <!-- Divider -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <!-- Menu Items -->
                            <li>
                                <a class="py-2 dropdown-item d-flex align-items-center"
                                    href="{{ route('profile.setting') }}">
                                    <i class="fa fa-user me-3 text-primary"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="py-2 dropdown-item d-flex align-items-center text-danger" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt me-3"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="adminHMD professional admin dashboard template">
    <title>Dashboard | adminHMD</title>

    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <style>
        .bgVideo {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: none;
        }

        body {
            background: transparent !important;
        }

        .videoFront {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            background: rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <video class="bgVideo" loop muted autoplay>
        <source src="{{ asset('admin/admin-panel.mp4') }}">
    </video>

    <div class="videoFront"></div>

    <div class="admin-shell">
        <div class="sidebar-backdrop" data-sidebar-close></div>

        <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
            <div class="sidebar-header">
                <a class="brand-mark" href="{{ url('/') }}" aria-label="adminHMD dashboard">
                    <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
                    <span class="brand-copy">
                        <span class="brand-title">adminHMD</span>
                        <span class="brand-subtitle">Admin Template</span>
                    </span>
                </a>
            </div>

            <nav class="sidebar-nav">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}" aria-current="page">
                    <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a class="nav-link {{ request()->routeIs('blogs.index') ? 'active' : '' }}"
                    href="{{ route('blogs.index') }}">
                    <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                    <span class="nav-text">Blog</span>
                </a>
                <a class="nav-link {{ request()->routeIs('carousel.index') ? 'active' : '' }}"
                    href="{{ route('carousel.index') }}">
                    <span class="nav-icon"><i class="bi bi-back" aria-hidden="true"></i></span>
                    <span class="nav-text">Carousel</span>
                </a>
                <a class="nav-link {{ request()->routeIs('services.index') ? 'active' : '' }}"
                    href="{{ route('services.index') }}">
                    <span class="nav-icon"><i class="bi bi-basket3" aria-hidden="true"></i></span>
                    <span class="nav-text">Service</span>
                </a>
                <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                    href="{{ route('categories.index') }}">
                    <span class="nav-icon"><i class="bi bi-collection" aria-hidden="true"></i></span>
                    <span class="nav-text">Category</span>
                </a>
                <a class="nav-link {{ request()->routeIs('tags.index') ? 'active' : '' }}"
                    href="{{ route('tags.index') }}">
                    <span class="nav-icon"><i class="bi bi-collection-fill" aria-hidden="true"></i></span>
                    <span class="nav-text">Tags</span>
                </a>
                <a class="nav-link" href="add-user.html">
                    <span class="nav-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
                    <span class="nav-text">Add User</span>
                </a>
                <a class="nav-link" href="profile.html">
                    <span class="nav-icon"><i class="bi bi-person-badge" aria-hidden="true"></i></span>
                    <span class="nav-text">Profile</span>
                </a>
                <a class="nav-link" href="charts.html">
                    <span class="nav-icon"><i class="bi bi-bar-chart-line" aria-hidden="true"></i></span>
                    <span class="nav-text">Charts</span>
                </a>
                <a class="nav-link" href="tables.html">
                    <span class="nav-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
                    <span class="nav-text">Tables</span>
                </a>
                <a class="nav-link" href="forms.html">
                    <span class="nav-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
                    <span class="nav-text">Forms</span>
                </a>
                <a class="nav-link" href="components.html">
                    <span class="nav-icon"><i class="bi bi-grid-3x3-gap" aria-hidden="true"></i></span>
                    <span class="nav-text">Components</span>
                </a>
                <a class="nav-link" href="alerts.html">
                    <span class="nav-icon"><i class="bi bi-exclamation-triangle" aria-hidden="true"></i></span>
                    <span class="nav-text">Alerts</span>
                </a>
                <a class="nav-link" href="modals.html">
                    <span class="nav-icon"><i class="bi bi-window-stack" aria-hidden="true"></i></span>
                    <span class="nav-text">Modals</span>
                </a>
                <a class="nav-link" href="settings.html">
                    <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
                    <span class="nav-text">Settings</span>
                </a>
                <a class="nav-link" href="blank.html">
                    <span class="nav-icon"><i class="bi bi-file-earmark" aria-hidden="true"></i></span>
                    <span class="nav-text">Blank Page</span>
                </a>
            </nav>

            <div class="sidebar-user">
                @if (auth()->user()->avatar)

                    <img class="avatar-md sidebar-user-avatar" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                        alt="Admin Hasan">

                @else
                    <div
                        class="avatar-img avatar-md sidebar-user-avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                        {{ Str::upper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
                <p class="m-0">{{ auth()->user()->name}}</p>
                <small>Active Workspace</small>
            </div>

            <div class="sidebar-footer">
                <span class="status-dot"></span>
                <span class="sidebar-footer-text">System running smoothly</span>
            </div>
        </aside>

        <div class="admin-main">
            <nav class="navbar admin-navbar navbar-expand bg-white">
                <div class="container-fluid px-3 px-lg-4">
                    <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar"
                        aria-expanded="true" aria-label="Toggle sidebar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
                        <input class="form-control search-input" type="search"
                            placeholder="Search users, orders, reports" aria-label="Search">
                    </form>

                    <div class="navbar-actions ms-auto">
                        <button class="icon-button theme-toggle" type="button" data-theme-toggle
                            aria-label="Switch color theme" title="Switch color theme">
                            <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
                        </button>
                        <div class="dropdown">
                            <button class="icon-button" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                aria-label="Notifications">
                                <span class="notification-dot"></span>
                                <i class="bi bi-bell" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end notification-menu">
                                <div class="dropdown-header fw-bold text-body">Notifications</div>
                                <a class="dropdown-item" href="users.html">
                                    <span class="notification-title">New user registered</span>
                                    <span class="notification-time">4 minutes ago</span>
                                </a>
                                <a class="dropdown-item" href="charts.html">
                                    <span class="notification-title">Revenue target reached</span>
                                    <span class="notification-time">32 minutes ago</span>
                                </a>
                                <a class="dropdown-item" href="settings.html">
                                    <span class="notification-title">Security review completed</span>
                                    <span class="notification-time">1 hour ago</span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="dropdown-toggle rounded btn btn-outline-dark text-white border btn-sm"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if (auth()->user()->avatar)
                                    <img class="avatar-sm" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                        alt="Admin Hasan">

                                @else
                                    <div class="avatar-sm bg-primary badge d-flex align-items-center justify-content-center rounded-circle"
                                        style="width: 30px; height: 30px; object-fit: cover;">
                                        {{ Str::upper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                @endif
                                <span class="d-none d-sm-inline">{{ auth()->user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="settings.html">Account settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Sign Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            @yield('content')

            <footer class="admin-footer">
                <div class="container-fluid px-3 px-lg-4">
                    <span>Copyright 2026 adminHMD. <br> Developed by <a target="_blank" class="fw-bold text-success"
                            href="https://github.com/HasanMahmudDev">Md. Hasan Mahmud</a> • Distributed by <a
                            target="_blank" class="fw-bold text-success" href="https://themewagon.com">ThemeWagon</a>
                    </span>
                    <span>Professional dashboard template.</span>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
</body>

</html>
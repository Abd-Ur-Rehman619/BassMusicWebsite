@if (Auth::guard('admin'))
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }} "
                                href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                                Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('admin.profile') ? 'active' : '' }}"
                                href="{{ route('admin.profile') }}"><i class="fa fa-fw fa-info-circle"></i>
                                Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-users"></i>
                                Users </a>
                            <div id="submenu-2" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::routeIs('admin.visitors') ? 'active' : '' }}"
                                            href="{{ route('admin.visitors') }}">Visitors</a>
                                    </li>
                                    <li class="nav-item {{ Request::routeIs('admin.creators') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('admin.creators') }}"> Creators </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::routeIs('admin.events.*') ? 'active' : '' }}" href="#"
                                data-toggle="collapse" aria-expanded="false" data-target="#submenu-1"
                                aria-controls="submenu-1">
                                <i class="fas fa-fw fa-file"></i>Events
                                <span class="badge badge-success">6</span>
                            </a>
                            <div id="submenu-1" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.events.create') }}">Add New</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.events.index') }}">Events</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('admin.category.*') ? 'active' : '' }} "
                                href="{{ route('admin.category.index') }}"><i class="fas fa-fw fa-chart-pie"></i>
                                Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('admin.news.*') ? 'active' : '' }}"
                                href="{{ route('admin.news.index') }}"><i class="fab fa-fw fa-wpforms"></i> News</a>
                        </li>

                        <li class="nav-divider">
                            Music
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-music"></i>
                                Music
                            </a>
                            <div id="submenu-6" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.musics.create') }}">Add New</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.musics.index') }}"> View Music</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('admin.comments.*') ? 'active' : '' }}"
                                href="{{ route('admin.comments.index') }}"><i class="fab fa-fw fa-wpforms"></i>
                                Comments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('admin.summary.*') ? 'active' : '' }}"
                                href="{{ route('admin.summary.index') }}"><i class="fa fa-thumbs-up"></i> Summary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('admin.messages.*') ? 'active' : '' }}"
                                href="{{ route('admin.messages.index') }}"><i class="fa fa-envelope"></i>
                                Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.logout') }}"><i
                                    class="fas fa-power-off mr-2"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
@endif
@if (Auth::guard('web') && auth()->user()->User_type === 'Normal-User')
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#"> Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Visitor.dashboard') ? 'active' : '' }} "
                                href="{{ route('Visitor.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                                Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Visitor.profile') ? 'active' : '' }}"
                                href="{{ route('Visitor.profile') }}"><i class="fa fa-fw fa-info-circle"></i>
                                Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Visitor.events.*') ? 'active' : '' }}"
                                href="{{ route('Visitor.events.index') }}"><i class="fas fa-fw fa-file"></i>
                                Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Visitor.category.*') ? 'active' : '' }}"
                                href="{{ route('Visitor.category.index') }}"><i class="fas fa-fw fa-chart-pie"></i>
                                Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Visitor.news.*') ? 'active' : '' }}"
                                href="{{ route('Visitor.news.index') }}"><i class="fab fa-fw fa-wpforms"></i>
                                News</a>
                        </li>
                        <li class="nav-divider">
                            Music
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Visitor.musics.*') ? 'active' : '' }}"
                                href="{{ route('Visitor.musics.index') }}"><i class="fas fa-fw fa-music"></i>
                                Music</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Visitor.comments.*') ? 'active' : '' }}"
                                href="{{ route('Visitor.comments.index') }}"><i class="fa fa-comment"></i>
                                Comments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Visitor.summary.*') ? 'active' : '' }}"
                                href="{{ route('Visitor.summary.index') }}"><i class="fa fa-thumbs-up"></i>
                                Summary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"><i
                                    class="fas fa-power-off mr-2"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@endif

@if (Auth::guard('web') && auth()->user()->User_type === 'Creator')
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#"> Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Creator.dashboard') ? 'active' : '' }} "
                                href="{{ route('Creator.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                                Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Creator.profile') ? 'active' : '' }}"
                                href="{{ route('Creator.profile') }}"><i class="fa fa-fw fa-info-circle"></i>
                                Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Creator.visitors') ? 'active' : '' }}"
                                href="{{ route('Creator.visitors') }}"><i class="fa fa-fw fa-user-circle"></i>
                                Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                data-target="#submenu-7" aria-controls="submenu-7"><i class="fa fa-comment"></i>
                                Events </a>
                            <div id="submenu-7" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('Creator.events.create') }}">Add New</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('Creator.events.index') }}">Events</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Creator.category.*') ? 'active' : '' }} "
                                href="{{ route('Creator.category.index') }}"><i class="fas fa-fw fa-chart-pie"></i>
                                Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Creator.news.*') ? 'active' : '' }}"
                                href="{{ route('Creator.news.index') }}"><i class="fab fa-fw fa-wpforms"></i>
                                News</a>
                        </li>

                        <li class="nav-divider">
                            Music
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                data-target="#submenu-16" aria-controls="submenu-16"><i
                                    class="fas fa-fw fa-music"></i>
                                Music
                            </a>
                            <div id="submenu-16" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('Creator.musics.create') }}">Add New</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('Creator.musics.index') }}"> View
                                            Music</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Creator.comments.*') ? 'active' : '' }}"
                                href="{{ route('Creator.comments.index') }}"><i class="fab fa-fw fa-wpforms"></i>
                                Comments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('Creator.summary.*') ? 'active' : '' }}"
                                href="{{ route('Creator.summary.index') }}"><i class="fa fa-thumbs-up"></i>
                                Summary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"><i
                                    class="fas fa-power-off mr-2"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
@endif

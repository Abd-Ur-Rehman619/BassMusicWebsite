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
                            data-target="#submenu-16" aria-controls="submenu-16"><i class="fas fa-fw fa-music"></i>
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

                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->

<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="index.php" class="nav-brand"> <img src="{{ asset('FrontEnd-Assets/img/core-img/logo.jpg') }}"
                            alt="LOGO" style="width: 50px; border-radius: 5px;"> </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('Ablums') }}">Albums</a></li>

                                <li><a href="{{ route('events') }}">Events</a></li>
                                <li><a href="{{ route('news') }}">News</a></li>
                                <li><a href="{{ route('contactUs') }}">Contact</a></li>
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->
                                <div class="login-register-btn mr-3">
                                    <a href="{{ route('login') }}" id="loginBtn">Login <i class="fa fa-unlock"></i>
                                    </a>
                                </div>
                                <div class="login-register-btn pr-3">
                                    <a href="login.html" id="loginBtn">| </a>
                                </div>
                                <div class="login-register-btn">
                                    <a href="{{ route('register') }}" id="loginBtn"> Register <i
                                            class="fa fa-user-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('Dashboard-assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('Dashboard-assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Dashboard-assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard-assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('FrontEnd-Assets/img/core-img/logo.jpg') }}">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="card-header text-center"><a href=""><img class="logo-img"
                        src="{{ asset('FrontEnd-Assets/img/core-img/logo.jpg') }}" alt="logo"
                        style="height: 100px;"></a><span class="splash-description">Please Enter your
                    credential.</span></div>
            <div class="card-body">
                <form action="{{ route('admin.loginCheck') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="User_Name" type="text"
                            placeholder="Username" value="{{ old('User_Name') }}">
                        @if ($errors->has('User_Name'))
                            <span class="text-danger">{{ $errors->first('User_Name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password"
                            placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span
                                class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Admin Login?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('Dashboard-assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('Dashboard-assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>

</html>

@extends('FrontEndLayout.main')
@section('main.container')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay"
        style="background-image: url(FrontEnd-Assets/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p> Just 30Sec away </p>
            <h2>Login</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back</h3>
                        @if (Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                {{ Session::get('failed') }}
                                <button type="button" class="btn-close" data-dismiss="alert">×</button>
                            </div>
                        @endif
                        <!-- Login Form -->
                        <div class="login-form">
                            <form method="post" action="{{ route('user.login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Enter E-mail" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger"> {{ $errors->first('email') }} </div>
                                    @endif
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Kindly
                                        enter the Valid Email, that are entered
                                        at registration.</small>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        value="">
                                    @if ($errors->has('password'))
                                        <div class="text-danger"> {{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                {{-- Captcah Start Here --}}
                                <div class="row">
                                    <div class="form-group col-md-6 mt-4 mb-4">
                                        <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group  col-md-6 mt-4 mb-4">
                                        <input id="captcha" type="text" class="form-control"
                                            placeholder="Enter Captcha" name="captcha">
                                        @if ($errors->has('captcha'))
                                            <span class="text-danger"> {{ $errors->first('captcha') }}</span>
                                        @endif
                                    </div>
                                </div>
                                {{-- Captcha End Here --}}
                                <button type="submit" name="submit" class="btn oneMusic-btn mt-30">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->
@endsection
@section('js-section')
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endsection

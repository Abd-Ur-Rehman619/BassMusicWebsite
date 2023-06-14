@extends('FrontEndLayout.main')
@section('main.container')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay"
        style="background-image: url(FrontEnd-Assets/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <h2>Sign UP</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3> Provide the Details</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{ route('user.register') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" minlength="3" placeholder="Name" value="{{ old('name') }}"
                                        required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> Email address</label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp"
                                        placeholder="Enter E-mail" value="{{ old('email') }}" required>
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Kinldy
                                        Remember the email / UserName You Have
                                        Entered.</small>
                                    @if ($errors->has('email'))
                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        value="{{ old('password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger"> {{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Re-Enter Password</label>
                                    <input type="password" name="confirm_password" class="form-control"
                                        placeholder="Confirm Password" value="{{ old('confirm_password') }}" required>
                                    @if ($errors->has('confirm_password'))
                                        <span class="text-danger"> {{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="tel" class="form-control" name="contact_no"
                                        placeholder="Contact Number" value="{{ old('contact_no') }}" required>
                                    @if ($errors->has('contact_no'))
                                        <span class="text-danger"> {{ $errors->first('contact_no') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" minlength="3" class="form-control" name="address"
                                        placeholder="Address" value="{{ old('address') }}" required>
                                    @if ($errors->has('address'))
                                        <span class="text-danger"> {{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Profile</label>
                                    <input type="file" name="image" class="form-control" required>
                                    @if ($errors->has('image'))
                                        <span class="text-danger"> {{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>User Type</label>
                                    <select name="user_type" class="form-control" required>
                                        <option value="" Selected hidden> Select User Type</option>
                                        <option value="Normal-User"> Normal-User</option>
                                        <option value="Creator"> Creator</option>
                                    </select>
                                    @if ($errors->has('user_type'))
                                        <span class="text-danger"> {{ $errors->first('user_type') }}</span>
                                    @endif
                                </div>
                                {{-- Captcah Start Here --}}
                                <div class="form-group mt-4 mb-4">
                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha"
                                        name="captcha">
                                    @if ($errors->has('captcha'))
                                        <span class="text-danger"> {{ $errors->first('captcha') }}</span>
                                    @endif
                                </div>
                                {{-- Captcha End Here --}}
                                <button type="submit" name="submit" class="btn oneMusic-btn mt-30">Register</button>
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
    <!-- toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    {{-- Toastr Script --}}
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>

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

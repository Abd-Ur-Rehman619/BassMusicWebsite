@extends('DashboardLayout.maindash')
@section('main.dashboard')
    {{-- Main Container --}}
    <div class="dashboard-wrapper">
        <div class="dashboard-influence">
            <div class="container-fluid dashboard-content">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2"> Dashboard </h3>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('Creator.dashboard') }}"
                                                class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page"> <a
                                                href="{{ route('Creator.visitors') }}"> Users </a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Add New User </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"> Profile Details </h5>
                            <div class="card-body">
                                <form id="" action="{{ route('Creator.addNewUser') }}" method="POST"
                                    enctype="multipart/form-data" data-parsley-validate="" novalidate="">
                                    @csrf
                                    @if (Session::has('success'))
                                        <div class="alert alert-info alert-dismissible col-md-12" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Success!</strong> {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Success!</strong> {{ Session::get('error') }}
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" name="name" value="{{ old('name') }}" required=""
                                                minlength="3" placeholder="Name Of the User" class="form-control">
                                            @if ($errors->has('name'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                    <li class="parsley-required">{{ $errors->first('name') }}</li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="email" name="email" value="{{ old('email') }}" required=""
                                                data-parsley-type="email" placeholder="Enter a valid e-mail"
                                                class="form-control">
                                            @if ($errors->has('email'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                    <li class="parsley-required">{{ $errors->first('email') }}</li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" name="password" minlength="4" maxlength="20"
                                                required="" value="{{ old('password') }}" placeholder=" Password"
                                                class="form-control">
                                            @if ($errors->has('password'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                    <li class="parsley-required">{{ $errors->first('password') }}</li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Contact Number</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" name="contact_no" required=""
                                                value="{{ old('contact_no') }}" data-parsley-type="number" placeholder=""
                                                class="form-control phone-inputmask" id="phone-inputmask">
                                            <small class="text-muted"> 03xx xxxxxxx </small>
                                            @if ($errors->has('contact_no'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                    <li class="parsley-required">{{ $errors->first('contact_no') }}</li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Profile</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="file" name="image" required=""
                                                data-parsley-type="Image" placeholder="Select Image"
                                                class="form-control">
                                            @if ($errors->has('image'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                    <li class="parsley-required">{{ $errors->first('image') }}</li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{-- <label class="col-12 col-sm-3 col-form-label text-sm-right">User Type</label> --}}
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="hidden" name="user_type" value="Normal-User">
                                            {{-- <select name="user_type" class="form-control" required>
                                                <option value="" selected="" hidden=""> SELECT User-Type
                                                </option>
                                                <option value="Normal-User">Normal User</option>
                                                <option value="Creator">Creator</option>
                                            </select> --}}
                                            @if ($errors->has('user_type'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                    <li class="parsley-required">{{ $errors->first('user_type') }}</li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Address</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <textarea required="" name="address" class="form-control">{{ old('address') }}</textarea>
                                            @if ($errors->has('address'))
                                                <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                    <li class="parsley-required">{{ $errors->first('address') }}</li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row text-center">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button type="submit" name="submit"
                                                class="btn btn-space btn-primary col-sm-6">ADD NEW USER</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        {{-- Main Container --}}
    @endsection

    @section('js-section')
        <script src="{{ asset('Dashboard-assets/vendor/inputmask/js/jquery.inputmask.bundle.js') }}"></script>
        <script src="{{ asset('Dashboard-assets/vendor/parsley/parsley.js') }}"></script>
        <script>
            $('#for').parsley();
        </script>

        <script>
            $(function(e) {
                "use strict";
                $(".phone-inputmask").inputmask("99999999999"),

                    $(".email-inputmask").inputmask({
                        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                        greedy: !1,
                        onBeforePaste: function(n, a) {
                            return (e = e.toLowerCase()).replace("mailto:", "")
                        },
                        definitions: {
                            "*": {
                                validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                                cardinality: 1,
                                casing: "lower"
                            }
                        }
                    })
            });
        </script>
    @endsection

@extends('DashboardLayout.maindash')
@section('main.dashboard')
    {{-- Main Container --}}
    <div class="dashboard-wrapper">
        <div class="dashboard-influence">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2"> Dashboard </h3>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                                class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Profile </li>
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
                                <form id="validationform" method="POST" action="{{ route('admin.editprofile') }}"
                                    data-parsley-validate="" novalidate="">
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
                                    <input type="hidden" name="id" value="{{ Auth::guard('admin')->user()->id }}">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">UserName</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" name="User_Name" required="" minlength="3"
                                                value="{{ Auth::user()->UserName }}" placeholder="Type something"
                                                class="form-control">
                                            @if ($errors->has('User_Name'))
                                                <span class="text-danger"> {{ $errors->first('User_Name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="email" name="email" value="{{ Auth::user()->email }}"
                                                required="" data-parsley-type="email" placeholder="Enter a valid e-mail"
                                                class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="text-danger"> {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row text-center">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button type="submit" name="update"
                                                class="btn btn-space btn-primary col-sm-3">UPDATE</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end valifation types -->
                    <!-- ============================================================== -->
                </div>


            </div>
        </div>
        {{-- Main Container --}}
    @endsection

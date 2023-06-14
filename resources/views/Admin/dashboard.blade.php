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
                                        <li class="breadcrumb-item active"><a href="#"
                                                class="breadcrumb-link">Dashboard</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card influencer-profile-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="text-center">
                                            <img src="{{ asset('Dashboard-assets/images/man.png') }}" alt="User Avatar"
                                                class="rounded-circle user-avatar-xxl">
                                        </div>
                                    </div>
                                    <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="user-avatar-info">
                                            <div class="m-b-20">
                                                <div class="user-avatar-name">
                                                    <h2 class="mb-1"> {{ Auth::guard('admin')->user()->UserName }} </h2>
                                                </div>
                                                <div class="rating-star  d-inline-block">
                                                    <i class="fa fa-fw fa-user"></i>
                                                    <p class="d-inline-block text-dark">Admin </p>
                                                </div>
                                            </div>

                                            <div class="user-avatar-address">
                                                <p class="border-bottom pb-3">
                                                    <span class="d-xl-inline-block d-block mb-2"> <i
                                                            class="fab fa-fw fa-google mr-2 text-primary"></i>{{ Auth::guard('admin')->user()->email }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Users</h5>
                                    <h2 class="mb-0"> {{ count($creators) + count($visitors) }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                    <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Visitors</h5>
                                    <h2 class="mb-0">{{ count($visitors) }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Creators</h5>
                                    <h2 class="mb-0">{{ count($creators) }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                    <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Music</h5>
                                    <h2 class="mb-0"> {{ count($musics) }} </h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                    <i class="fa fa-music fa-fw fa-sm text-brand"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        {{-- Main Container --}}
    @endsection

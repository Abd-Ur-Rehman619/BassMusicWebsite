@extends('DashboardLayout.maindash')
@section('main.dashboard')
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
                            <a href="{{ route('admin.creators') }}" class="btn btn-primary btn-xs float-right">
                                Creators</a>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                                class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Deleted
                                                Creators</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- content  -->
                <!-- ============================================================== -->
                <div class="row">
                    @if (Session::has('success'))
                        <div class="alert alert-info alert-dismissible col-md-12" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <strong>Success!</strong> {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <strong>Success!</strong> {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="col-lg-12">
                        <div class="section-block">
                            <h3 class="section-title"> Deleted Creators </h3>
                        </div>
                        <div class="card">
                            <div class="p-3">
                                <table class="table" id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="border-0">
                                            <th class="border-0"> ID</th>
                                            <th class="border-0"> Name</th>
                                            <th class="border-0"> Email</th>
                                            <th class="border-0"> Contact No</th>
                                            <th class="border-0"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td> {{ $user->id }} </td>
                                                <td> {{ $user->Name }} </td>
                                                <td> {{ $user->email }} </td>
                                                <td> {{ $user->contact_no }} </td>
                                                <td>
                                                    <a href="{{ route('admin.permanentlyDelete', $user->id) }}"
                                                        class="btn btn-xs btn-danger">
                                                        <span class="fa fa-trash"></span> Permanently Delete </a>

                                                    <a href="{{ route('admin.restore', $user->id) }}"
                                                        class="btn btn-xs btn-info">
                                                        <span class="fa fa-retweet"></span> Restore </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-0">
                                            <th class="border-0">ID</th>
                                            <th class="border-0"> Name</th>
                                            <th class="border-0">Email</th>
                                            <th class="border-0">Contact No</th>
                                            <th class="border-0">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

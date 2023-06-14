@extends('DashboardLayout.maindash')
@section('css-section')
    <link rel="stylesheet" type="text/css" href="{{ asset('Dashboard-assets/date/jquery-ui.css') }}">
@endsection
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
                                        <li class="breadcrumb-item"><a href="{{ route('Creator.category.index') }}"
                                                class="breadcrumb-link">Categories</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Update Category </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"> Category Details </h5>
                            <div class="card-body">
                                <div class="row">
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
                                    <div class="col-8">
                                        <form id=""
                                            action="{{ route('Creator.category.update', $category_data->Cat_ID) }}"
                                            method="POST" enctype="multipart/form-data" data-parsley-validate=""
                                            novalidate="">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Title</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="title"
                                                        value="{{ $category_data->Cat_title }}" required=""
                                                        minlength="3" placeholder="Title of Category" class="form-control">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                {{-- <label class="col-12 col-sm-3 col-form-label text-sm-right">Hosted
                                                    by</label> --}}
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="hidden" name="hosted_by" value="{{ Auth::user()->id }}"
                                                        id="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right"> Description
                                                </label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <textarea required="" name="description" class="form-control">{{ $category_data->Cat_Description }}</textarea>
                                                </div>
                                            </div>


                                    </div>
                                    <div class="col-4">

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Image</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <img src="{{ asset('Admin/Category Images/' . $category_data->Cat_image) }}"
                                                    width="200" height="150" style="border-radius: 10px;">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-4 col-form-label text-sm-right">Cover
                                                Image</label>
                                            <div class="col-12 col-sm-8 col-lg-8">
                                                <input type="file" name="image" required=""
                                                    data-parsley-type="Image" placeholder="Select Image"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row text-center">
                                    <div class="col col-sm-12 col-lg-6 offset-sm-1 offset-lg-0">
                                        <button type="submit" name="update_image"
                                            class="btn btn-space btn-primary col-sm-12">UPDATE EVENT</button>

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

    @section('js-section')
        <script src="{{ asset('Dashboard-assets/vendor/inputmask/js/jquery.inputmask.bundle.js') }}"></script>
        <script src="{{ asset('Dashboard-assets/vendor/parsley/parsley.js') }}"></script>
        {{-- <script src="{{ asset('Dashboard-assets/date/jquery.min.js') }}"></script> --}}
        <script src="{{ asset('Dashboard-assets/date/jquery-ui.min.js') }}"></script>
        <script>
            $('#for').parsley();
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#date').datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true,
                    minDate: '0D',
                    maxDate: '3M'
                });
            });
        </script>
    @endsection

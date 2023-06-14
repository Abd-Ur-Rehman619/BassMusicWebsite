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
                                        <li class="breadcrumb-item"><a href="{{ route('Creator.dashboard') }}"
                                                class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('Creator.comments.index') }}"
                                                class="breadcrumb-link">Comments</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Update Comment </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"> Comment Details </h5>
                            <div class="card-body">
                                <form id="validationform" method="POST"
                                    action="{{ route('Creator.comments.update', $comment->id) }}" data-parsley-validate=""
                                    novalidate="">
                                    @csrf
                                    @method('PUT')
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

                                    {{-- <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Music File</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <audio src="../Admin/uploads/Dj_remix.mp3" controls="" alt="Audio File">
                                            </audio>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right"> Comment </label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <textarea required="" name="comment" class="form-control">{{ $comment->comments }}</textarea>
                                            @if ($errors->has('comment'))
                                                <span class="text-danger"> {{ $errors->first('comment') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row text-center">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button type="submit" name="update_details"
                                                class="btn btn-space btn-primary col-sm-6">UPDATE COMMENT</button>

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

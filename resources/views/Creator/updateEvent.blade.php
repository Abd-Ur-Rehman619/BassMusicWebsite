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
                                        <li class="breadcrumb-item"><a href="{{ route('Creator.events.index') }}"
                                                class="breadcrumb-link">Events</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Update Event </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"> Event Details </h5>
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
                                    <div class="col-7">
                                        <form id=""
                                            action="{{ route('Creator.events.update', $event_data->Event_ID) }}"
                                            method="POST" enctype="multipart/form-data" data-parsley-validate=""
                                            novalidate="">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Title</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="title"
                                                        value="{{ $event_data->Event_Title }}" required="" minlength="3"
                                                        placeholder="Title of Event" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Date</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="" autocomplete="off" name="date" id="date"
                                                        value="{{ $event_data->Event_Date }}" required=""
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Location</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="location" minlength="3" required=""
                                                        value="{{ $event_data->location }}"
                                                        placeholder=" Address of the Event" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{-- <label class="col-12 col-sm-3 col-form-label text-sm-right">Hosted
                                                    by</label>
                                                <div class="col-12 col-sm-8 col-lg-6"> --}}
                                                <input type="hidden" name="hosted_by" value="{{ $event_data->userID }}"
                                                    class="form-control">
                                                {{-- <select name="hosted_by" class="form-control">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}"
                                                                {{ $event_data->userID == $user->id ? 'selected' : '' }}>
                                                                {{ $user->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right"> Description
                                                </label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <textarea required="" cols="30" rows="5" name="description" class="form-control">{{ $event_data->Event_Description }}</textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Image</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <img src="{{ asset('Admin/Event Images/' . $event_data->event_image) }}"
                                                    width="200" height="150" style="border-radius: 10px;">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Cover
                                                Image</label>
                                            <div class="col-12 col-sm-8 col-lg-8">
                                                <input type="file" name="image" required=""
                                                    data-parsley-type="Image" placeholder="Select Image"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row text-center">
                                            <div class="col col-sm-12 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" name="update_image"
                                                    class="btn btn-space btn-primary col-sm-12">UPDATE EVENT</button>

                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
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

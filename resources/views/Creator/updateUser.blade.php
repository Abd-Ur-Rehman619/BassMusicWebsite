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
                                        <li class="breadcrumb-item" aria-current="page"> <a
                                                href="{{ route('Creator.visitors') }}"> Users </a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Update User </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"> Profile Details </h5>
                        <div class="card-body">
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
                                <div class="col-md-7">
                                    <form id="" action="{{ route('Creator.updateUser', $user_info->id) }}"
                                        method="POST" enctype="multipart/form-data" data-parsley-validate=""
                                        novalidate="">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="name" value="{{ $user_info['Name'] }}"
                                                    required="" minlength="3" placeholder="Type something"
                                                    class="form-control">
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
                                                <input type="email" name="email" value="{{ $user_info['email'] }}"
                                                    required="" data-parsley-type="email"
                                                    placeholder="Enter a valid e-mail" class="form-control">
                                                @if ($errors->has('email'))
                                                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                        <li class="parsley-required">{{ $errors->first('email') }}</li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Contact
                                                Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="contact_no" required=""
                                                    value="{{ $user_info['contact_no'] }}" data-parsley-type="number"
                                                    placeholder="" class="form-control phone-inputmask"
                                                    id="phone-inputmask">
                                                <small class="text-muted"> 0311 4562522 </small>
                                                @if ($errors->has('contact_no'))
                                                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                        <li class="parsley-required">{{ $errors->first('contact_no') }}
                                                        </li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">User-Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="User_type" value="{{ $user_info->User_type }}"
                                                    required="" readonly class="form-control">
                                                @if ($errors->has('user_type'))
                                                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                        <li class="parsley-required">{{ $errors->first('user_type') }}
                                                        </li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">User Status</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select name="status" class="form-control">
                                                    <option value='active'
                                                        {{ $user_info->status == 'active' ? 'selected' : '' }}>
                                                        Active</option>
                                                    <option value='inactive'
                                                        {{ $user_info->status == 'inactive' ? 'selected' : '' }}>
                                                        Inactive</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                        <li class="parsley-required">{{ $errors->first('status') }}
                                                        </li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right"> Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <textarea required="" name="address" class="form-control">{{ $user_info['Address'] }}</textarea>
                                                @if ($errors->has('address'))
                                                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                        <li class="parsley-required">{{ $errors->first('address') }}</li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Profile</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <img src="{{ asset('Admin/user images/' . $user_info->profile) }}"
                                                width="200" height="100" style="border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Profile</label>
                                        <div class="col-12 col-sm-8">
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
                                    <div class="form-group row text-center">
                                        <div class="col-12 col-sm-12 offset-sm-1 offset-lg-0">
                                            <button type="submit" name="update_info"
                                                class="btn btn-space btn-primary col-sm-10"> Update</button>

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

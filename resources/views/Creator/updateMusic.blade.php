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
                                        <li class="breadcrumb-item"><a href="{{ route('Creator.musics.index') }}"
                                                class="breadcrumb-link">Musics Files
                                            </a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Update
                                                Music Informators
                                            </a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"> Music Details </h5>
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
                                    <div class="col-6">
                                        <form id="" action="{{ route('Creator.musics.update', $music_data->id) }}"
                                            method="POST" enctype="multipart/form-data" data-parsley-validate=""
                                            novalidate="">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Title</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="text" name="title" value="{{ $music_data->title }}"
                                                        required="" minlength="3" placeholder="Music Title"
                                                        class="form-control">
                                                    @if ($errors->has('title'))
                                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                            <li class="parsley-required">{{ $errors->first('title') }}</li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Date</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input autocomplete="off" name="date" id="date"
                                                        value="{{ $music_data->date }}" placeholder="Select Date"
                                                        data-parsley-type="date" class="form-control">
                                                    @if ($errors->has('date'))
                                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                            <li class="parsley-required">{{ $errors->first('date') }}</li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                            <input type="hidden" name="posted_by" value="{{ Auth::user()->id }}"
                                                class="form-control">
                                            {{-- <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right"> Posted
                                                    By</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <select name="posted_by" id="posted_by" class="form-control" required>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}"
                                                                {{ $music_data->Author == $user->id ? 'selected' : '' }}>
                                                                {{ $user->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('posted_by'))
                                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                            <li class="parsley-required">{{ $errors->first('posted_by') }}
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">
                                                    Category</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <select name="cat" id="cat" class="form-control" required>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->Cat_ID }}"
                                                                {{ $music_data->catId == $category->Cat_ID ? 'selected' : '' }}>
                                                                {{ $category->Cat_title }}
                                                        @endforeach

                                                    </select>
                                                    @if ($errors->has('cat'))
                                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                            <li class="parsley-required">{{ $errors->first('cat') }}</li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Cover
                                                    Image</label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="file" name="image" data-parsley-type="Image"
                                                        placeholder="Select Image" class="form-control">
                                                    @if ($errors->has('image'))
                                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                            <li class="parsley-required">{{ $errors->first('image') }}
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-form-label text-sm-right"> Music File
                                                </label>
                                                <div class="col-12 col-sm-8 col-lg-6">
                                                    <input type="file" name="music" data-parsley-type="file"
                                                        class="form-control">
                                                    @if ($errors->has('music'))
                                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                            <li class="parsley-required">{{ $errors->first('music') }}
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>

                                    </div>
                                    <div class="col-5">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Image</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <img src="{{ asset('Admin/uploads/' . $music_data->image) }}"
                                                    width="200" height="100" style="border-radius: 10px;">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Music File</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <audio src="{{ asset('Admin/uploads/' . $music_data->music) }}"
                                                    controls="" alt="Audio File">
                                                </audio>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row text-center">
                                    <div class="col col-sm-12 col-lg-6 offset-sm-1 offset-lg-0">
                                        <button type="submit" name="update_image"
                                            class="btn btn-space btn-primary col-sm-12">UPDATE Music Details </button>

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
                    maxDate: '7D'
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#posted_by').on('change', function() {
                    var Uid = this.value;
                    $("#cat").html('');
                    // alert(Uid);
                    $.ajax({
                        url: "{{ url('fetch_categories') }}",
                        type: "POST",
                        data: {
                            Uid: Uid,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#cat').html('<option value=""> Select Category </option>');
                            $.each(result.cat, function(key, value) {
                                $("#cat").append('<option value="' + value
                                    .Cat_ID + '">' + value.Cat_title +
                                    '</option>');
                            });
                        }
                    });
                });

            });
        </script>
    @endsection

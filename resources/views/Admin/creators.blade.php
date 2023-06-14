@extends('DashboardLayout.maindash')
@section('css-section')
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/buttons/2.3.5/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('main.dashboard')
    <div class="dashboard-wrapper">
        <div class="dashboard-influence">
            <div class="container-fluid dashboard-content">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2"> Dashboard </h3>
                            <a href="{{ route('admin.archievdCreators') }}" class="btn btn-danger btn-xs float-right">
                                Deleted Creators</a>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                                class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><a href="#"
                                                class="breadcrumb-link">Creators</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

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
                            <h3 class="section-title"> Creators </h3>
                        </div>
                        <div class="card">
                            <div class="p-3">
                                <table class="table" id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="border-0">
                                            <th class="border-0">ID</th>
                                            <th class="border-0"> Name</th>
                                            <th class="border-0">Email</th>
                                            <th class="border-0">Contact No</th>
                                            <th class="border-0"> User-Status</th>
                                            <th class="border-0">Status</th>
                                            <th class="border-0">
                                                <a href="{{ route('admin.addUser') }}"
                                                    class="btn btn-xs btn-success editbtn"><span
                                                        class="fa fa-plus"></span></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td> {{ $user->id }} </td>
                                                <td> {{ $user->Name }} </td>
                                                <td> {{ $user->email }} </td>
                                                <td> {{ $user->contact_no }} </td>
                                                <td> {{ $user->status }} </td>
                                                <td>
                                                    <form action="{{ route('admin.changeStatus', $user->id) }}"
                                                        method="post">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="status" value="{{ $user->status }}" />
                                                        @if ($user->status == 'inactive')
                                                            <button type="submit" class="btn btn-xs btn-primary"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Click on to Active user"> <span
                                                                    class="fa fa-check"></span> </button>
                                                        @else
                                                            <button type="submit" class="btn btn-xs btn-warning"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Click on to Inactive user"> <span
                                                                    class="fas fa-times"></span> </button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="dropdown float-right">
                                                        <a href="#" class="dropdown  card-drop" data-toggle="dropdown"
                                                            aria-expanded="true">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <!-- item-->
                                                            <a href="{{ route('admin.deleteUser', $user->id) }}"
                                                                class="dropdown-item">Delete</a>
                                                            <!-- item-->
                                                            <a href="{{ route('admin.editUser', $user->id) }}"
                                                                class="dropdown-item"> Update</a>
                                                        </div>
                                                    </div>
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
                                            <th class="border-0"> Type</th>
                                            <th class="border-0">Status</th>
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
    @section('js-section')
        {{-- js --}}
        <script src="{{ url('https://code.jquery.com/jquery-3.5.1.js') }}"></script>
        <script src="{{ url('https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('https://cdn.datatables.net/buttons/2.3.5/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
        <script src="{{ url('https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js') }}"></script>
        <script src="{{ url('https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js') }}"></script>
        <script src="{{ url('https://cdn.datatables.net/buttons/2.3.5/js/buttons.colVis.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endsection

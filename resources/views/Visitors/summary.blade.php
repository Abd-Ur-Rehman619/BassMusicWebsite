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
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('Visitor.dashboard') }}"
                                                class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Summary
                                            </a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-block">
                            <h3 class="section-title"> Summary </h3>
                        </div>
                        <div class="card">
                            <div class="p-3">
                                <table class="table" id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="border-0">
                                            <th class="border-0">S.NO</th>
                                            <th class="border-0">Title</th>
                                            <th class="border-0">Image</th>
                                            <th class="border-0">Music File</th>
                                            <th class="border-0">Likes</th>
                                            <th class="border-0">Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($musics as $music)
                                            <tr>
                                                <td> {{ $music->id }} </td>
                                                <td> {{ $music->title }} </td>
                                                <td>
                                                    <div class="m-r-10"><img
                                                            src="{{ asset('Admin/uploads/' . $music->image) }}"
                                                            alt="Cover Image" width="35"></div>
                                                </td>
                                                <td>
                                                    <audio src="{{ asset('Admin/uploads/' . $music->music) }}"
                                                        controls="" alt="Audio File">
                                                    </audio>
                                                </td>
                                                <td> <span class="badge badge-primary">{{ count($music->likes) }}
                                                    </span> </td>
                                                <td> <span class="badge badge-info">{{ count($music->comments) }}</span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" align="center"><b> NO Record Found </b> </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-0">
                                            <th class="border-0">S.NO</th>
                                            <th class="border-0">Title</th>
                                            <th class="border-0">Image</th>
                                            <th class="border-0">Music File</th>
                                            <th class="border-0">Likes</th>
                                            <th class="border-0">Comments</th>
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

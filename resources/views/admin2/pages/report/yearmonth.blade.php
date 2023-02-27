@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/collects/filter_multi_select.css') }}" />
@endsection
@extends('admin2.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 text-center">
                    <div class="col-sm-12">
                        <h1>Year and Month wise <span class="text-red text-bold"></span> Data</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-10" id="notifications">&nbsp;</div>
                                </div>
                                <div class="row">

                                    <div class="col-2">

                                    </div>


                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>


                                            <th>year</th>
                                            <th>month</th>
                                            <th>total_amount</th>
                                            <th>total_received_amount</th>
                                            <th>total_due</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($yearmonth as $row)
                                            <tr>

                                                {{-- {{ print_r($row) }} --}}
                                                <td>{{ $row->camyear == '' ? 0 : $row->camyear }}</td>
                                                <td>{{ $row->mname == '' ? 0 : $row->mname }}</td>
                                                <td>{{ $row->total_amount == '' ? 0 : $row->total_amount }}</td>
                                                <td>{{ $row->total_received_amount == '' ? 0 : $row->total_received_amount }}
                                                </td>
                                                <td>{{ $row->total_due == '' ? 0 : $row->total_due }}</td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@section('customJs')
    <script src="{{ asset('assets/admin2/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/pdfmake/pdfmake.min.js') }}'"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="{{ asset('assets/admin2/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/collects/filter-multi-select-bundle.min.js.map') }}"></script>
    <script src="{{ asset('assets/collects/filter-multi-select-bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "autoFill": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#campaignhimel_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

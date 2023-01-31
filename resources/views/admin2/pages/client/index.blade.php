@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@extends('admin2.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
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
                            <div class="card-header d-flex">
                                {{--                                <h3 class="card-title">All Billings</h3> --}}
                                <div class="mr-auto p-2">
                                    <h3 class="card-title">All Clients</h3>
                                </div>
                                <div class="p-2">
                                    <a class="btn btn-block bg-gradient-info" href="{{ route('client.sheet.import') }}"><i
                                            class="fas fa-file-excel"></i>CSB
                                        Entry </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Type</th>
                                            <th>Name</th>
                                            <th>Commission(%)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->clientType->title }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->commission }}</td>
                                                {{--                                <td>{{ substr($client->note,0, 50) }} ...</td> --}}
                                                <td>
                                                    <div class="buttons btn-group btn-group-toggle">
                                                        <a href="{{ route('client.view', $client->uuid) }}"
                                                            class="btn icon btn-success"><i class="icon-eye-open"></i>
                                                            View </a>
                                                        <a target="_blank" href="{{ route('client.edit', $client->uuid) }}"
                                                            class="btn icon btn-primary"><i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        {{-- <form method="POST" action="{{ route('client.destroy', $client->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn icon btn-danger" style="white-space: nowrap;">Delete</button>
                                                    </form> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Type</th>
                                            <th>Name</th>
                                            <th>Commission(%)</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
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
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection

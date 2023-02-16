@php
    use Carbon\Carbon;
@endphp
@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        .buttons-copy {
            background: rgb(56, 0, 150);
            color: white;
        }

        .buttons-copy:hover {
            background: #7800D9;
            color: white;
        }

        .buttons-csv {
            background: rgb(56, 0, 150);
            color: white;
        }

        .buttons-csv:hover {
            background: #7800D9;
            color: white;
        }

        .buttons-excel {
            background: rgb(56, 0, 150);
            color: white;
        }

        .buttons-excel:hover {
            background: #7800D9;
            color: white;
        }

        .buttons-pdf {
            background: rgb(56, 0, 150);
            color: white;
        }

        .buttons-pdf:hover {
            background: #7800D9;
            color: white;
        }

        .buttons-print {
            background: rgb(56, 0, 150);
            color: white;
        }

        .buttons-print:hover {
            background: #7800D9;
            color: white;
        }

        .buttons-colvis {
            background: rgb(56, 0, 150);
            color: white;
        }

        .buttons-colvis:hover {
            background: #7800D9;
            color: white;
        }

        .page-item.active .page-link {
            background: rgb(56, 0, 150);
            background: linear-gradient(90deg, rgba(56, 0, 150, 1) 0%, rgba(86, 0, 181, 1) 35%, rgba(103, 70, 170, 1) 100%);
            border-color: #6746aa;
        }

        .greenbdg {
            background-color: green;
            color: white;
        }
    </style>
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                    <h3 class="card-title">All Billings</h3>
                                </div>
                                <div class="p-2">
                                    <div class="buttons btn-group btn-group-toggle">
                                        {{--                                        <a class="btn icon btn-primary" href="{{ route('campaign.data.refresh') }}"><i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh </a> --}}
                                        {{-- <a class="btn icon btn-primary" href="#"><i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh </a> --}}
                                        <a class="btn icon btn-primary text-light"
                                            href="{{ route('billing.sheet.import') }}"><i class="fas fa-file-excel"></i> CSB
                                            Entry </a>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="campaignhimel" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Year</th>
                                            <th>Period</th>
                                            <th>Campaign</th>
                                            <th>Estimate No</th>
                                            <th>Bill No</th>
                                            <th> Date</th>
                                            <th> Status</th>
                                            <th>Actions</th>
                                            <th>Due</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($campaigns as $campaign)
                                            <tr>

                                                <td>{{ $campaign->id }}</td>
                                                <td>{{ $campaign->client->name }}</td>
                                                <td>{{ $campaign->year }}</td>
                                                <td>{{ date('F', mktime(0, 0, 0, $campaign->month, 10)) }}</td>
                                                <td>{{ $campaign->title }}</td>
                                                <td>{{ $campaign->estimate_no == '' ? '-' : $campaign->estimate_no }}
                                                </td>
                                                <td>{{ $campaign->bill_no == '' ? '-' : $campaign->bill_no }}</td>
                                                <td>{{ $campaign->bill_submission_date }}</td>

                                                <td>
                                                    @php
                                                        $paymentType = strtoupper($campaign->payment_status);
                                                        
                                                        // dd($campaign->due);
                                                        
                                                    @endphp
                                                    {{-- {{ var_dump((new DateTime($campaign->bill_submission_date))->diff(new DateTime('now'))->days) }} --}}
                                                    @if ($campaign->due === 0 && $campaign->unbilled_amount === 0)
                                                        <span class="badge badge-success">Paid</span>
                                                    @elseif (
                                                        $campaign->due !== 0 &&
                                                            (new DateTime($campaign->bill_submission_date))->diff(new DateTime('now'))->days > 60 &&
                                                            $campaign->unbilled_amount === 0)
                                                        <span
                                                            class="badge badge-warning">{{ ((new DateTime($campaign->bill_submission_date))->diff(new DateTime('now'))->days) }} Matured
                                                        </span>
                                                    @elseif (
                                                        $campaign->due !== 0 &&
                                                            (new DateTime($campaign->bill_submission_date))->diff(new DateTime('now'))->days < 60 &&
                                                            $campaign->unbilled_amount === 0)
                                                        <span
                                                            class="badge badge-info">{{ ((new DateTime($campaign->bill_submission_date))->diff(new DateTime('now'))->days) }} immature
                                                        </span>
                                                    @elseif ($campaign->unbilled_amount !== 0)
                                                        <span class="badge badge-warning">False</span>
                                                    @else
                                                        <span class="badge badge-danger">due</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('campaign.view', $campaign->id) }}"
                                                        class="btn btn-sm btn-primary text-light">view </a>
                                                    <a href="{{ route('campaign.edit', $campaign->uuid) }}"
                                                        class="btn btn-sm btn-secondary text-light">
                                                        Edit </a>
                                                </td>
                                                <td>{{ $campaign->due }}</td>
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
    <script src="{{ asset('assets/admin2/plugins/pdfmake/pdfmake.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script> --}}
    <script src="{{ asset('assets/admin2/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#campaignhimel").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#campaignhimel_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

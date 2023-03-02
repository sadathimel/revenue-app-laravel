@section('customCSS')
<link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
    .buttons-copy {
        background: rgb(56,0,150);
        color: white;
    }

    .buttons-copy:hover {
        background: #7800D9;
        color: white;
    }

    .buttons-csv {
        background: rgb(56,0,150);
        color: white;
    }
    .buttons-csv:hover {
        background: #7800D9;
        color: white;
    }
    .buttons-excel {
        background: rgb(56,0,150);
        color: white;
    }
    .buttons-excel:hover {
        background: #7800D9;
        color: white;
    }
    .buttons-pdf {
        background: rgb(56,0,150);
        color: white;
    }
    .buttons-pdf:hover {
        background: #7800D9;
        color: white;
    }
    .buttons-print {
        background: rgb(56,0,150);
        color: white;
    }
    .buttons-print:hover {
        background: #7800D9;
        color: white;
    }
    .buttons-colvis {
        background: rgb(56,0,150);
        color: white;
    }
    .buttons-colvis:hover {
        background: #7800D9;
        color: white;
    }

    .page-item.active .page-link{
        background: rgb(56,0,150);
        background: linear-gradient(90deg, rgba(56,0,150,1) 0%, rgba(86,0,181,1) 35%, rgba(103,70,170,1) 100%);
        border-color: #6746aa;
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
{{--                                <h3 class="card-title">All Billings</h3>--}}
                                <div class="mr-auto p-2">
                                    <h3 class="card-title">All Billings</h3>
                                </div>
                                <div class="p-2">
                                    <div class="buttons btn-group btn-group-toggle">
{{--                                        <a class="btn icon btn-primary" href="{{ route('campaign.data.refresh') }}"><i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh </a>--}}
                                        <a class="btn icon btn-primary" href="#"><i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh </a>
                                        <a class="btn icon btn-success" href="{{ route('billing.sheet.import') }}"><i class="fas fa-file-excel"></i> Bulk Entry </a>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-3 col-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Client Name <span style="color: red;">*</span> </label>--}}
{{--                                            <select class="form-control select2" name="client_id" id="client_id" style="width: 100%;">--}}
{{--                                                @foreach($campaigns as $campaign)--}}
{{--                                                    <option value="{{ $campaign->client_id }}">{{$campaign->client->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Year</th>
                                        <th>Period</th>
                                        <th>Campaign</th>
                                        <th>Description</th>
                                        <th>Estimate No</th>
                                        <th>Bill No</th>
                                        <th>Bill Submission Date</th>
                                        <th>Pending Day</th>
                                        <th>Maturity Date</th>
                                        <th>Gross</th>
                                        <th>Agency Comm</th>
                                        <th>Net</th>
                                        <th>Vat</th>
                                        <th>Bill Amount</th>
                                        <th>Payment status</th>
                                        <th>Received Amount</th>
                                        <th>CHQ Num</th>
                                        <th>CHQ Rec Date</th>
                                        <th>Due</th>
                                        <th>Cheque Amount</th>
                                        <th>0-59 Days</th>
                                        <th>60-89 Days</th>
                                        <th>90-119 Days</th>
                                        <th>120-500 Days</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($campaigns as $campaign)
                                        <tr>
                                            <td>{{ $campaign->id }}</td>
                                            <td>{{ $campaign->client->name }}</td>
                                            <td>{{ $campaign->year }}</td>
                                            <td>{{ date('F', mktime(0, 0, 0, $campaign->month, 10)) }}</td>
                                            <td>{{ $campaign->title }}</td>
                                            <td>{{ substr($campaign->description,0, 20) }} ...</td>
                                            <td>{{ ($campaign->estimate_no == '') ? '-' : $campaign->estimate_no }}</td>
                                            <td>{{ ($campaign->bill_no == '') ? '-' : $campaign->bill_no }}</td>
                                            <td>{{ $campaign->bill_submission_date }}</td>
                                            <td>{{ $campaign->pending_day }}</td>
                                            <td>{{ $campaign->maturity_date }}</td>
                                            <td>{{ $campaign->gross }}</td>
                                            <td>{{ $campaign->client_commission }}</td>
                                            <td>{{ $campaign->net }}</td>
                                            <td>{{ $campaign->vat }}</td>
                                            <td>{{ $campaign->bill_amount }}</td>
                                            <td>{{ $campaign->payment_status }}</td>
                                            <td>{{ ($campaign->received_amount == '') ? '-' : $campaign->received_amount }}</td>
                                            <td>{{ ($campaign->chq_num == '') ? '-' : $campaign->chq_num }}</td>
                                            <td>{{ ($campaign->chq_rec_date == '') ? '-' : $campaign->chq_rec_date }}</td>
                                            <td>{{ $campaign->due }}</td>
                                            <td>{{ ($campaign->cheque_amount == '') ? '-' : $campaign->cheque_amount }}</td>
                                            <td>{{ $campaign->day_0_to_59}}</td>
                                            <td>{{ $campaign->day_60_to_89 }}</td>
                                            <td>{{ $campaign->day_90_to_119 }}</td>
                                            <td>{{ $campaign->day_120_to_500 }}</td>
                                            <td>
                                                <div class="buttons btn-group btn-group-toggle">
                                                    <a href="#" class="btn icon btn-primary"><i class="fas fa-money-bill"></i> Bill </a>
                                                    <a target="_blank" href="{{ route('campaign.edit',$campaign->uuid)}}" class="btn icon btn-secondary"><i class="fas fa-edit"></i> Update </a>
                                                    <form method="POST" action="{{ route('campaign.trash', $campaign->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn icon btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i> Delete </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Filters</th>
                                        <th>
{{--                                            <select class="form-control select2" name="client_id" id="client_id" style="width: 100%;" data-column="1" filter-select>--}}
{{--                                                <option value="">--Client--</option>--}}
{{--                                                @foreach($campaigns as $campaign)--}}
{{--                                                    <option value="{{ $campaign->client_id }}">{{$campaign->client->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
                                        </th>
                                        <th>
                                            <select class="form-control select2" name="client_id" id="client_id" style="width: 100%;" data-column="2" filter-select>
                                                <option value="">--Year--</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year}}">{{$year}}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th>Period</th>
                                        <th>Campaign</th>
                                        <th>Description</th>
                                        <th>Estimate No</th>
                                        <th>Bill No</th>
                                        <th>Bill Submission Date</th>
                                        <th>Pending Day</th>
                                        <th>Maturity Date</th>
                                        <th>Gross</th>
                                        <th>Agency Comm</th>
                                        <th>Net</th>
                                        <th>Vat</th>
                                        <th>Bill Amount</th>
                                        <th>Payment status</th>
                                        <th>Received Amount</th>
                                        <th>CHQ Num</th>
                                        <th>CHQ Rec Date</th>
                                        <th>Due</th>
                                        <th>Cheque Amount</th>
                                        <th>0-59 Days</th>
                                        <th>60-89 Days</th>
                                        <th>90-119 Days</th>
                                        <th>120-500 Days</th>
                                        <th>Actions</th>
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
    <script src="{{asset('assets/admin2/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('assets/admin2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/admin2/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('assets/admin2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/admin2/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('assets/admin2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/admin2/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/admin2/plugins/pdfmake/pdfmake.min.js') }}'"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="{{asset('assets/admin2/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{asset('assets/admin2/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('assets/admin2/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('assets/admin2/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $("#example1").DataTable({--}}
{{--                "responsive": true, "lengthChange": false, "autoWidth": false,--}}
{{--                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]--}}
{{--            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');--}}

{{--        });--}}
{{--    </script>--}}
    <script type="text/javascript">
        $(function () {

            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            });

            {{--var table = $('#example1').DataTable({--}}
            {{--    'processing': true,--}}
            {{--    'serverSide': true,--}}
            {{--    'ajax': "{{ route('campaign.lists') }}",--}}
            {{--    'columns': [--}}
            {{--        {data: 'year'}--}}
            {{--    ]--}}
            {{--});--}}

            {{--$('.filter-select').change(function(){--}}
            {{--    table.column( $(this).data('column'))--}}
            {{--        .search( $(this).val())--}}
            {{--        .draw();--}}
            {{--});--}}

        });
    </script>
@endsection



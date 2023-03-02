@section('customCSS')
<link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
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
                                    <h3 class="card-title">All Deleted Campaigns</h3>
                                </div>
                                <div class="p-2">
                                    <form action="{{ route('trash.remove.all.campaigns') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-block bg-gradient-danger"><i class="fas fa-eraser"></i> delete all the records </button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
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
                                            <td>..</td>
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
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
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



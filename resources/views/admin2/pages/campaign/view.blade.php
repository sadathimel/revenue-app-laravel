@extends('admin2.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bill Entry Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Bill Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Bill Entry</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body mx-auto text-center">

                        <h3>Client Name:{{ ucwords($campaign->client->name) }}</h3>
                        <h2>Campaign:{{ ucwords($campaign->title) }}</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{--                                <div class="row"> --}}
                        {{--                                    <div class="col-md-3 col-6"> --}}
                        {{--                                        <div class="form-group"> --}}
                        {{--                                            <label>Client Name <span style="color: red;">*</span> </label> --}}
                        {{--                                            <select class="form-control select2" name="client_id" id="client_id" style="width: 100%;"> --}}
                        {{--                                                @foreach ($campaigns as $campaign) --}}
                        {{--                                                    <option value="{{ $campaign->client_id }}">{{$campaign->client->name}}</option> --}}
                        {{--                                                @endforeach --}}
                        {{--                                            </select> --}}
                        {{--                                        </div> --}}
                        {{--                                    </div> --}}
                        {{--                                </div> --}}
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>

                                <tr>

                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <th>ID</th>
                                    <td>{{ $campaign->id }}</td>
                                    <th>Client Name</th>
                                    <td>{{ $campaign->client->name }}</td>
                                </tr>

                                <tr>
                                    <th>Year</th>
                                    <td>{{ $campaign->year }}</td>
                                    <th>Period</th>
                                    <td>{{ date('F', mktime(0, 0, 0, $campaign->month, 10)) }}</td>
                                </tr>
                                <tr>
                                    <th>Campaign</th>
                                    <td>{{ $campaign->title }}</td>
                                    <th>Description</th>
                                    <td>{{ substr($campaign->description, 0, 20) }} ...</td>
                                </tr>


                                <tr>

                                    <th>Estimate No</th>
                                    <td>{{ $campaign->estimate_no == '' ? '-' : $campaign->estimate_no }}
                                    </td>
                                    <th>Bill No</th>
                                    <td>{{ $campaign->bill_no == '' ? '-' : $campaign->bill_no }}</td>
                                </tr>


                                <tr>
                                    <th>Bill Submission Date</th>
                                    <td>{{ $campaign->bill_submission_date }}</td>
                                    <th>Pending Day</th>
                                    <td>{{ $campaign->pending_day }}</td>
                                </tr>


                                <tr>
                                    <th>Maturity Date</th>
                                    <td>{{ $campaign->maturity_date }}</td>
                                    <th>Gross</th>
                                    <td>{{ $campaign->gross }}</td>
                                </tr>


                                <tr>
                                    <th>Agency Commission in %</th>
                                    <td>{{ $campaign->client_commission_in }} % </td>
                                    <th>Agency Comm</th>
                                    <td>{{ $campaign->client_commission }}</td>
                                </tr>


                                <tr>
                                    <th>Net</th>
                                    <td>{{ $campaign->net }}</td>
                                    <th>Bill Amount</th>
                                    <td>{{ $campaign->bill_amount }}</td>
                                </tr>

                                <tr>

                                    <th>Vat Amount in %</th>
                                    <td>{{ $campaign->vatd }} % </td>
                                    <th>Vat</th>
                                    <td>{{ $campaign->vat }}</td>
                                </tr>

                                <tr>
                                    <th>Payment status</th>
                                    <td>{{ $campaign->payment_status }}</td>
                                    <th>Received Amount</th>
                                    <td>{{ $campaign->received_amount == '' ? '-' : $campaign->received_amount }} </td>
                                </tr>

                                <tr>
                                    <th>CHQ Num</th>
                                    <td>{{ $campaign->chq_num == '' ? '-' : $campaign->chq_num }}</td>
                                    <th>CHQ Rec Date</th>
                                    <td>{{ $campaign->chq_rec_date == '' ? '-' : $campaign->chq_rec_date }}</td>
                                </tr>


                                <tr>
                                    <th>Due</th>
                                    <td>{{ $campaign->due }}</td>
                                    <th>Cheque Amount</th>
                                    <td>{{ $campaign->cheque_amount == '' ? '-' : $campaign->cheque_amount }}</td>
                                </tr>


                                <tr>

                                    <th>0-59 Days</th>
                                    <td>{{ $campaign->day_0_to_59 }}</td>
                                    <th>60-89 Days</th>
                                    <td>{{ $campaign->day_60_to_89 }}</td>
                                </tr>


                                <tr>

                                    <th>90-119 Days</th>

                                    <td>{{ $campaign->day_90_to_119 }}</td>

                                    <th>120-500 Days</th>
                                    <td>{{ $campaign->day_120_to_500 }}</td>



                                </tr>




                                {{-- @endforeach --}}


                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->
        </section>

    </div>
@endsection

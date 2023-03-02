@section('customCSS')
{{--    <style>--}}
{{--        .fontawesome-icons {--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        article dl {--}}
{{--            background-color: rgba(0, 0, 0, .02);--}}
{{--            padding: 20px;--}}
{{--        }--}}

{{--        .fontawesome-icons .the-icon {--}}
{{--            font-size: 24px;--}}
{{--            line-height: 1.2;--}}
{{--        }--}}
{{--    </style>--}}
@endsection
@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Campaign Lists</h3>
                    <p class="text-subtitle text-muted">Here is the list of all campaigns.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Campaigns</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Campaign Lists</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <p class="text-subtitle text-muted">
                                Campaign Data
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <div class="buttons">
                                    <a href="{{ route('campaign.data.refresh') }}" class="btn icon btn-sm btn-success"><i class="bi bi-arrow-clockwise"></i> Refresh</a>
                                    <a href="#" class="btn icon btn-secondary"><i class="bi bi-box-arrow-right"></i> Export</a>
                                    <a href="#" class="btn icon btn-lg btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-add" viewBox="0 0 16 16">
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z"></path>
                                            <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1V1Z"></path>
                                            <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"></path>
                                        </svg> Create</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="table1">
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
                                    <div class="buttons">
                                        <a href="#" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn icon btn-secondary"><i class="bi bi-person"></i></a>
                                        <a href="#" class="btn icon btn-info"><i class="bi bi-info-circle"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection

@section('customJs')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: '<"top"flp>rt<"bottom"ip>',
                buttons: [
                    {
                        text: 'Export as PDF',
                        action: function ( e, dt, node, config ) {
                            // code to export the table as a PDF file
                        }
                    },
                    {
                        text: 'Export as Excel',
                        action: function ( e, dt, node, config ) {
                            // code to export the table as an Excel file
                        }
                    },
                    {
                        text: 'Reload',
                        action: function ( e, dt, node, config ) {
                            dt.ajax.reload();
                        }
                    },
                    {
                        text: 'Create',
                        action: function ( e, dt, node, config ) {
                            // code to create a new record
                        }
                    }
                ]
            });
        });

    </script>
@endsection



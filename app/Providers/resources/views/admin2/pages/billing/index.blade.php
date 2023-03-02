@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Billing Page</h3>
                    <p class="text-subtitle text-muted">Here is the list of all bills.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Billing</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Billing Lists</li>
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
                                Billing Data
                            </p>
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
{{--                            <th>Estimate No</th>--}}
{{--                            <th>Bill No</th>--}}
                            <th>Payment status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($campaigns as $campaign)
                            <tr>
                                <td>{{ $campaign->id }}</td>
                                <td>{{ $campaign->client->name }}</td>
                                <td>{{ $campaign->year }}</td>
                                <td>{{ date('F', mktime(0, 0, 0, $campaign->month, 10)) }}</td>
                                <td>{{ substr($campaign->title,0, 20) }} ...</td>
                                <td>{{ substr($campaign->description,0, 20) }} ...</td>
{{--                                <td>{{ ($campaign->estimate_no == '') ? '-' : $campaign->estimate_no }}</td>--}}
{{--                                <td>{{ ($campaign->bill_no == '') ? '-' : $campaign->bill_no }}</td>--}}
                                <td>{{ $campaign->payment_status }}</td>
                                <td>
                                    <div class="btn-group btn-group-inline">
                                            <a type="button" class="btn btn-primary" style="white-space: nowrap;" target="_blank" href="{{ route('billing.edit',$campaign->uuid)}}"><i class="bi bi-pencil-square"></i> bill</a>
                                            <a type="button" class="btn btn-danger" style="white-space: nowrap;" target="_blank" href="#"><i class="bi bi-printer"></i> print</a>
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


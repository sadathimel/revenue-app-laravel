@extends('admin2.layouts.master')

@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><b>৳</b> {{ number_format($campaignes->sum('bill_amount')) }} </h3>

                                <p>Total Bill</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('report.all') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><b>৳</b> {{ number_format($campaignes->sum('received_amount')) }} </h3>

                                <p>Total Received</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('report.paid') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3> <b>৳</b> {{ number_format($campaignes->sum('due')) }} </h3>

                                <p>Total Due</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('report.due') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>


                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Year</th>

                                <th>Total amount</th>

                                <th>Total Received</th>

                                <th>Due</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cam1 as $row)
                                {{-- {{ dd($row) }} --}}
                                <tr>
                                    <td> {{ $row->year }}</td>
                                    <td> <b>৳</b> {{ number_format($row->total_amount) }}</td>
                                    <td> <b>৳</b> {{ number_format($row->total_received_amount) }}</td>
                                    <td> <b>৳</b> {{ number_format($row->total_due) }}</td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>





            </div><!-- /.container-fluid -->
        </section>


    </div>
@endsection

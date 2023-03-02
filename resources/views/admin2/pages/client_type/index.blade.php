@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Client Type Lists</h3>
                    <p class="text-subtitle text-muted">Here is the list of all type of clients.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Clients</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Client Types</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Client Types Data
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($client_types as $client_type)
                            <tr>
                                <td>{{$client_type->id}}</td>
                                <td>{{$client_type->title}}</td>
                                <td>{{ substr($client_type->note,0, 50) }} ...</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
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


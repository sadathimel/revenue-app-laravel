@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Client Lists</h3>
                    <p class="text-subtitle text-muted">Here is the list of all clients.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Clients</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Client Lists</li>
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
                            <th>Client Type</th>
                            <th>Name</th>
                            <th>Commission(%)</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->clientType->title}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->commission}}</td>
{{--                                <td>{{ substr($client->note,0, 50) }} ...</td>--}}
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-success" >View</button>
                                        <button class="btn btn-sm btn-primary">Edit</button>
                                        <form method="POST" action="{{ route('client.destroy', $client->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        <button class="btn btn-sm btn-danger" style="white-space: nowrap;">Delete</button>
                                        </form>
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



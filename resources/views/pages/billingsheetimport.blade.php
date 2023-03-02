@extends('layouts.master')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Import Billing Sheet</h3>
                <p class="text-subtitle text-muted">file handling</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Import</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Billing Sheet</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">File Uploader</h5>
                    </div>
                    <div class="card-content">
                        <form action="{{ route('bill.import') }}"
                              enctype="multipart/form-data"
                              method="post">
                            @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6>Select Client</h6>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    <select class="form-select" id="inputGroupSelect01" name="client_option">
                                        @foreach($clients as $client)
                                             <option value="{{ $client->id }}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                            <input type="file" name="import_file"/>
                            <br>
                            <br>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

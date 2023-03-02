@extends('layouts.master')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Campaign</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('campaign.store') }}" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h6>Select Client</h6>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                            <select class="form-select" id="inputGroupSelect01" name="client_id">
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}">{{$client->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="title" class="form-label">Campaign Name</label>
                                            <input type="text" id="title" class="form-control" name="title" placeholder="Ex: bKash" value="{{ old('title') }}" data-parsley-required="true" required>
                                            @if($errors->has('title'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('title') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="description" class="form-label">Campaign Description</label>
                                            <input type="text" id="description" class="form-control" placeholder="Ex: bKash Electricity Pay Bill Campaign" name="description" value="{{ old('description') }}" data-parsley-required="true" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="year" class="form-label">Year</label>
                                            <input type="number" id="city-column" class="form-control" name="year" min="2020" max="2099" step="1" value="2023" data-parsley-required="true" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="month" class="form-label">Period</label>
                                            <select class="form-select" id="inputGroupSelect01" name="month" data-parsley-required="true" required>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Gross <i class="fas fa-info-circle" title="basic amount"></i></label>
                                            <input type="number" id="first-name-column" class="form-control" name="gross" value="{{ old('gross') }}" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label">Agency Commission</label>
                                            <input type="number" id="last-name-column" class="form-control" name="commission" value="{{ old('commission') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Net <i class="fas fa-info-circle" title="after calculating commission"></i> </label>
                                            <input type="number" id="first-name-column" class="form-control" name="net" value="{{ old('net') }}" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Vat <i class="fas fa-info-circle" title="current vat in (%) is {{ $vat['value'] }}%"></i> </label>
                                            <input type="number" id="first-name-column" class="form-control" name="vat" value="{{ old('vat') }}" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Bill amount</label>
                                            <input type="number" id="first-name-column" class="form-control" placeholder="final bill amount" name="bill_amount" value="{{ old('bill_amount') }}" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Received amount</label>
                                            <input type="number" id="first-name-column" class="form-control" placeholder="how much amount received" name="received_amount" value="{{ old('received_amount') }}" data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

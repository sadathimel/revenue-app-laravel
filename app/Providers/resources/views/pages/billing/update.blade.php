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
                            @if (isset($campaign))
                            <form class="form" action="{{ route('billing.update', $campaign->uuid) }}" method="POST" data-parsley-validate>
                                @method('PATCH')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Select Campaign</label>
                                            <select class="choices form-select" disabled>
                                                <optgroup label="Campaigns" name="client_option">
                                                    <option value="{{ $campaign->uuid }}">{{$campaign->description}}</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Campaign</label>
                                            <input type="text" id="first-name-column" class="form-control" name="title" value="{{ old('title', $campaign->title) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Client</label>
                                            <input type="text" id="first-name-column" class="form-control" name="client" value="{{ old('client', $campaign->client->name) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Estimation ID <i class="fas fa-info-circle" title=""></i> </label>
                                            <input type="text" id="first-name-column" class="form-control" name="estimate_no" value="{{ old('estimate_no', $campaign->estimate_no) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Bill ID</label>
                                            <input type="text" id="first-name-column" class="form-control" name="bill_no" value="{{ old('bill_no', $campaign->bill_no) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Gross <i class="fas fa-info-circle" title="basic amount"></i></label>
                                            <input type="number" id="first-name-column" class="form-control" name="gross" value="{{ old('gross', $campaign->gross) }}" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label">Agency Commission</label>
                                            <input type="number" id="last-name-column" class="form-control" name="commission" value="{{ old('commission', $campaign->gross) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Net <i class="fas fa-info-circle" title="after calculating commission"></i> </label>
                                            <input type="number" id="first-name-column" class="form-control" name="net" value="{{ old('net', $campaign->net) }}" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Vat <i class="fas fa-info-circle" title="current vat in (%) is {{ $vat['value'] }}%"></i> </label>
                                            <input type="number" id="first-name-column" class="form-control" name="vat" value="{{ old('vat', $campaign->vat) }}" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Bill amount</label>
                                            <input type="number" id="first-name-column" class="form-control" placeholder="final bill amount" name="bill_amount" value="{{ old('bill_amount', $campaign->bill_amount) }}" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Received amount</label>
                                            <input type="number" id="first-name-column" class="form-control" placeholder="how much amount received" name="received_amount" value="{{ old('received_amount', $campaign->received_amount) }}" data-parsley-required="true">
                                        </div>
                                    </div>

                                    <div class="pt-3"></div>
                                    <div class="col-6 col-md-12">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            Button with data-bs-target
                                        </button>
                                    </div>

                                    <div class="pt-3"></div>
                                    <div class="col-12">
                                        <div class="collapse" id="collapseExample">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="first-name-column" class="form-label">Cheque Number</label>
                                                        <input type="text" id="first-name-column" class="form-control" placeholder="how much amount received" name="chq_num" value="{{ old('chq_num', $campaign->chq_num) }}" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="first-name-column" class="form-label">Cheque Amount</label>
                                                        <input type="number" id="first-name-column" class="form-control" placeholder="how much amount received" name="cheque_amount" value="{{ old('cheque_amount', $campaign->cheque_amount) }}" data-parsley-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Cheque Received Date</label>
                                            <input type="date" id="first-name-column" class="form-control"  name="fname-column" value="<?php echo date($campaign->chq_rec_date); ?>" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="pt-3"></div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" value="" id="terms" name="terms" required>
                                            <label class="form-check-label" for="terms">
                                                I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                            @error('terms')
                                            <div class="invalid-feedback">
                                                You must agree to the terms and conditions
                                            </div>
                                            @enderror
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

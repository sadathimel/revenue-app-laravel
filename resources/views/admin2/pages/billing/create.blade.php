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
                            <form class="form" data-parsley-validate>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Select Campaign</label>
                                            <select class="choices form-select">
                                                <optgroup label="Campaigns" name="client_option">
                                                    @foreach($campaigns as $campaign)
                                                        <option value="{{ $campaign->id }}">{{$campaign->description}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Gross</label>
                                            <input type="number" id="first-name-column" class="form-control" placeholder="basic amount" name="fname-column" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label">Agency Commission</label>
                                            <input type="number" id="last-name-column" class="form-control" placeholder="" name="lname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Net</label>
                                            <input type="number" id="first-name-column" class="form-control" placeholder="after calculating commission" name="fname-column" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Vat</label>
                                            <input type="number" id="first-name-column" class="form-control" placeholder="after calculating vat" name="fname-column" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Bill amount</label>
                                            <input type="number" id="first-name-column" class="form-control" placeholder="final bill amount" name="fname-column" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Received amount</label>
                                            <input type="number" id="first-name-column" class="form-control" placeholder="how much amount received" name="fname-column" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="pt-3"></div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            <img src="{{asset('assets/images/icons/checkbook.png')}}" /> Paying by cheque
                                        </button>
                                        <div class="pt-3"></div>
                                        <div class="collapse" id="collapseExample">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="first-name-column" class="form-label">Cheque Number</label>
                                                        <input type="text" id="first-name-column" class="form-control" placeholder="how much amount received" name="fname-column" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="first-name-column" class="form-label">Cheque Amount</label>
                                                        <input type="number" id="first-name-column" class="form-control" placeholder="how much amount received" name="fname-column" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="first-name-column" class="form-label">Cheque Received Date</label>
                                                        <input type="date" id="first-name-column" class="form-control"  name="fname-column" value="<?php echo date('Y-m-d'); ?>" data-parsley-required="true">
                                                    </div>
                                                </div>
                                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

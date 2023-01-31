@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>VAT</h3>
                    <p class="text-subtitle text-muted">   <span class="text-danger">*</span> Only <b>admin</b> can update this page</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Admin Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page">VAT</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">VAT Rates for 2022-23 in Bangladesh</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h1 class="text-info">
                            @foreach($vats as $vat)
                                {{ $vat->value }}  (%)
                            @endforeach
                        </h1>
                        <!-- Button trigger for Disabled Backdrop -->
                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#backdrop">
                            Update VAT
                        </button>

                        <!--Disabled Backdrop Modal -->
                        <div class="modal fade text-left" id="backdrop" tabindex="-1" aria-labelledby="myModalLabel4" data-bs-backdrop="false" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel4">Update VAT</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form"  method="POST" action="{{ route('vat.update', $vat->id) }}" data-parsley-validate>
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="first-name-column" class="form-label">Current VAT(%)</label>
                                                        <input type="number" id="first-name-column" step="0.01" min="0" max="100" class="form-control" placeholder="Ex. 10.50" name="value" value="{{ $vat->value }}" data-parsley-required="true" required>
                                                    </div>
                                                </div>
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
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    {!! Toastr::message() !!}
@endsection

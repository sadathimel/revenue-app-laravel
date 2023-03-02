@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Import Client Name Sheet</h3>
                    <p class="text-subtitle text-muted">file handling</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Import</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Client Name Sheet</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">File Uploader</h5>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false" tabindex="-1">Single Import</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">Bulk Import</a>
                                    </li>
                                </ul>
                                <div class="pb-5"></div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form class="form" method="POST" action="{{ route('client.store') }}" data-parsley-validate>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <h6>Select Client Type</h6>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="client_type_id">
                                                            @foreach($client_types as $client_type)
                                                                <option value="{{ $client_type->id }}">{{$client_type->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="name" class="form-label">Client Name</label>
                                                        <input type="text" id="name" class="form-control" name="name" placeholder="Ex: Analyzen Bangladesh Limited" value="{{ old('name') }}" data-parsley-required="true" required>
                                                        @if($errors->has('name'))
                                                            <div class="alert alert-danger">
                                                                {{ $errors->first('name') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email" class="form-label">Client Email</label>
                                                        <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ex: example@gmail.com">
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="phone" class="form-label">Client Phone/Mobile Number</label>
                                                        <input type="number" id="phone" class="form-control" name="phone" placeholder="Ex: 01xxxxxx" value="{{ old('phone') }}" @error('phone') is-invalid @enderror>
                                                        @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="address" class="form-label">Client Address</label>
                                                        <input type="text" id="address" class="form-control" name="address" placeholder="Ex: Level 1, House , Road No., Gulshan 1, Dhaka 1212" value="{{ old('address') }}">
                                                        @if($errors->has('address'))
                                                            <div class="alert alert-danger">
                                                                {{ $errors->first('address') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="logo" class="form-label">Client Logo</label>
                                                        <input type="file" id="logo" class="form-control" name="import_file" />
                                                        @if($errors->has('logo'))
                                                            <div class="alert alert-danger">
                                                                {{ $errors->first('logo') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="commission" class="form-label">Client Commission</label>
                                                        <input type="number" step="any" id="commission" class="form-control" name="commission" placeholder="Ex: 0 (in %)" value="{{ old('commission') ?? '0.00' }}"  @error('commission') is-invalid @enderror">
                                                        @error('commission')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="note" class="form-label">Write a note</label>
                                                        <input type="text" id="address" class="form-control" name="note" placeholder="Ex: good client" value="{{ old('note') }}" @error('note') is-invalid @enderror>
                                                        @if($errors->has('note'))
                                                            <div class="alert alert-danger">
                                                                {{ $errors->first('note') }}
                                                            </div>
                                                        @endif
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
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ route('client.sheet.import') }}"
                                              enctype="multipart/form-data"
                                              method="post">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <h6>Select Client Type</h6>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="client_type_option">
                                                            @foreach($client_types as $client_type)
                                                                <option value="{{ $client_type->id }}">{{$client_type->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="file" name="import_file"/>
                                            <br>
                                            <br>
                                            <button type="submit">Submit</button>
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


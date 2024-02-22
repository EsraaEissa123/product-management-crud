@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb d-flex justify-content-between mt-3">
        <div class="pull-left">
            <h2> Show pharmacy</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pharmacies.index') }}"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $pharmacy->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
        <div class="form-group">
            <strong>address:</strong>
            {{ $pharmacy->address }}
        </div>
    </div>
</div>
@endsection

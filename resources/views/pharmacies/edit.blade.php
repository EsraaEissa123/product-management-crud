@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb d-flex justify-content-between mt-3">
        <div class="pull-left">
            <h2>Edit pharmacy</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pharmacies.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger mt-2">
    There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('pharmacies.update',$pharmacy->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mt-2">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $pharmacy->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>address:</strong>
                <input type="address" name="address" value="{{ $pharmacy->address }}" class="form-control"
                    placeholder="address">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection

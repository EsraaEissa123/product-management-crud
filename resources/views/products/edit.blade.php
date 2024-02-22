@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-3">
        <div class="pull-left">
            <h2>Edit product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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
<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ $product->title }}" class="form-control" placeholder="title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="description" value="{{ $product->description }}" class="form-control"
                    placeholder="description">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Image:</strong>
                    @if($product->image && file_exists(public_path('images/' . $product->image)))
                    <img src="{{ asset('images/' . $product->image) }}" style="max-width: 200px; margin-bottom: 10px;"
                        alt="Product Image">
                    @elseif($product->image)
                    <img src="{{ $product->image }}" style="max-width: 200px; margin-bottom: 10px;" alt="Product Image">
                    @endif
                    <input type="file" name="image" class="form-control" placeholder="Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>
@endsection

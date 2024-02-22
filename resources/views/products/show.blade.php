@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-3">
        <div class="pull-left">
            <h2> Show product </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $product->title }}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
    <div class="form-group">
        <strong>Description:</strong>
        {{ $product->description }}
    </div>
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
    </div>
</div>
<h3>Prices of product in pharmacies</h3>
<table class="table table-bordered">
    <tr>
        <th>Pharmay</th>
        <th>Price</th>
        <th>quantity</th>
    </tr>
    @foreach ($product->pharmacies as $pharmacy)
    <tr>
        <td>{{$pharmacy->name }}</td>
        <td>{{$pharmacy->pivot->price }}</td>
        <td>{{$pharmacy->pivot->quantity}}</td>
    </tr>
    @endforeach
</table>
</div>
@endsection

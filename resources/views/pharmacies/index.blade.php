@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-3">
        <div class="pull-left">
            <h2>List pharmacies</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('pharmacies.create') }}"> Create New pharmacy</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success mt-2">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered mt-2">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>address</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($pharmacies as $pharmacy)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $pharmacy->name }}</td>
        <td>{{ $pharmacy->address }}</td>
        <td>
            <form action="{{ route('pharmacies.destroy',$pharmacy->id) }}" method="POST">
                <a href="{{ route('pharmacies.show',$pharmacy->id) }}"><i style="font-size:30px"
                        class="fa fa-eye black"></i></a>
                <a href="{{ route('pharmacies.edit',$pharmacy->id) }}"><i style="font-size:30px"
                        class="fa fa-edit black"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" style="background: none; border: none; cursor: pointer; padding: 0;"><i
                        style="font-size:30px" class="fa fa-trash-o"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $pharmacies->links() }}
@endsection

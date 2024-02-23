@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
        @endif
        <div class="d-flex justify-content-between mb-3 mt-3">
            <h2>Products</h2>
        </div>
        <div class="pull-left">
            <input type="text" id="keyword" class="mb-3 form-control" placeholder="Search here...">
        </div>
        <div class="pull-right mb-3">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New product</a>
        </div>
    </div>
</div>
<div id="allProducts">
    <table class="table table-bordered">
        <tr class="text-center align-middle">
            <th>Title</th>
            <th>Description</th>
            <th>Total quantity</th>
            <!-- <th>Price</th> -->
            <th>image</th>
            <th width="280px">Action</th>
        </tr>
        <tbody>
            @foreach ($products as $product)
            <tr class="text-center align-middle" name-data="{{ $product->title  }}">
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    @if ($product->image && file_exists(public_path('images/' . $product->image)))
                    <img src="{{ asset('images/' . $product->image) }}" alt="Product Image">
                    @elseif($product->image)
                    <img src="{{ $product->image }}" alt="Product Image">
                    @endif
                </td>
                <td>
                    <form id="deleteForm" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a href="{{ route('products.show', $product->id) }}" title="View Product"><i
                                style="font-size:30px" class="fa fa-eye black"></i></a>
                        <a href="{{ route('products.edit', $product->id) }}" title="Edit Product"><i
                                style="font-size:30px" class="fa fa-edit black"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete Product"
                            style="background: none; border: none; cursor: pointer; padding: 0;"
                            onclick="confirmDelete(event)"><i style="font-size:30px" class="fa fa-trash-o"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection
@section('scripts')
<script>
    $('#keyword').keyup(function() {
        let keyword = $(this).val();

        if (keyword.trim() === '') {
            window.location.reload();
        } else {
            let url = "{{ route('products.search') }}?keyword=" + keyword;
            $.ajax({
                type: "GET",
                url: url,
                contentType: false,
                processData: false,
                success: function(products) {
                    $('#allProducts').empty();
                    for (product of products.data) {
                        let route = "{{ route('products.show', ":slug") }}";
                        route = route.replace(':slug', product.id);
                        console.log(route);
                        $('#allProducts').append(`
                            <a href="${route}"><h3>${product.title}</h3></a>
                            <p>${product.description}</p>
                        `);
                    }
                }
            });
        }
    });
   function confirmDelete(event) {
event.preventDefault();
Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.isConfirmed) {
document.getElementById('deleteForm').submit();
}
});
}
</script>
@endsection


@extends('layout.base')

@section('title', 'Home')

@section('contents')

<div class="container mt-5">
    <h1 class="mb-4">Edit Product</h1>
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
        </div>
        <div class="form-group">
            <label for="product_image">Product Image</label>
            <input type="file" class="form-control-file" id="product_image" name="product_image">
            @if($product->product_image)
                <img src="{{ asset('images/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

@endsection
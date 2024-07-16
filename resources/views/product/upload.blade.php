@extends('layout.base')

@section('title', 'Home')

@section('contents')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<h1><b>Upload Your Vehicle Details</b></h1>
<form action="{{ route('upload.product') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mt-4">
        <label for="product_name">Vehicle Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" required>
    </div>
    <div class="form-group mt-3">
        <label for="product_image">Vehicle Image</label>
        <input type="file" class="form-control-file" id="product_image" name="product_image" required>
    </div>
    <button type="submit" class="btn btn-primary m-4">Upload Product</button>
</form>

@endsection
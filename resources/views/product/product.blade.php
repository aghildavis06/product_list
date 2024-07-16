@extends('layout.base')

@section('title', 'Home')

@section('contents')

<div class="container mt-5">
    <h1 class="mb-4">All Vehicles</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card mb-4" style="width: 100%; height: auto;">
                    <img class="card-img-top" src="{{ asset('images/' . $product->product_image) }}" alt="{{ $product->product_name }}" style="width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h5 class="card-title mb-0" style="font-size: 1.25rem;">{{ $product->product_name }}</h5>
                        <div class="mt-auto">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary mt-2">Edit</a>
                            <form action="{{ route('product.delete', $product->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2 ml-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
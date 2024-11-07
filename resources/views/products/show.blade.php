@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <div class="card">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Product Image" onerror="this.style.display='none';">
            <div class="card-body">
                <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p><strong>Stock:</strong> {{ $product->stock }}</p>
            </div>
        </div>

     
        <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products List</a>

            <div class="d-flex gap-2">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection

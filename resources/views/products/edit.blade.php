@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_id">Product ID:</label>
                <input type="text" class="form-control" name="product_id" id="product_id" value="{{ $product->product_id }}" required>
            </div>
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" name="price" id="price" step="0.01" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
@endSection

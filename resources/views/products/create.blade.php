@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="container mt-5">
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product_id" class="form-label">Product ID:</label>
            <input type="text" class="form-control" name="product_id" id="product_id" required>
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Product Name:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="price" class="form-label">Price:</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="stock" class="form-label">Stock:</label>
            <input type="number" class="form-control" name="stock" id="stock">
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </form>
</div>
@endSection

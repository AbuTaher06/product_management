@extends('layouts.app')

@section('title', 'Products List')

@section('content')
<div class="container">
    <h1>Available Products</h1>

    <!-- Create Product Button and Search Bar  -->
    <div class="row mb-4">
        <div class="col-md-4 text-right">
            <a href="{{ route('products.create') }}" class="btn btn-primary mt-2">Create Product</a>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="GET" action="{{ route('products.index') }}" class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Products" value="{{ request('search') }}" style="width: 20%; min-width: 100px;">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Filter Dropdown with Sort By label -->
    <div class="row mb-4 align-items-center">
        <div class="col-md-4 offset-md-8">
            <form method="GET" action="{{ route('products.index') }}">
                <label for="sort" class="mr-2">Sort By:</label>
                <select name="sort" id="sort" class="form-control d-inline-block" onchange="this.form.submit()" style="width: auto; display: inline-block;">
                    <option value="">Sort by</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z to A</option>
                </select>
            </form>
        </div>
    </div>

    <!-- Products Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="width: 50px; height: auto;" onerror="this.style.display='none';">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="d-flex gap-2">

                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->appends(request()->except('page'))->links() }}
    </div>
</div>
@endsection

@extends('layouts.app_admin')

@section('title', 'All Products')

@section('content')

<div id="right-panel" class="right-panel">
    <div class="container">
        <h1 class="my-4" style="color: #9b7a52">All Products</h1>

        <!-- Add Product Button -->
        <div class="mb-3">
            <a href="{{ route('admin.products.create') }}" class="btn text-light" style="background-color: #b18b5e">Add New Product</a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.products.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search products by name" value="{{ request()->get('search') }}">

                <select name="category" class="form-control ml-2">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->get('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <div class="input-group-append">
                    <button class="btn" type="submit" style="background-color: #b18b5e; color: white;">Search</button>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @foreach($product->productImages as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}" 
                                 alt="Product Image" 
                                 class="img-fluid" 
                                 style="width: 80px; height: 80px; object-fit: cover; border-radius: 4px; margin-right: 5px;">
                        @endforeach
                    </td>                    
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>JD{{ number_format($product->price, 2) }}</td>
                    <td>
                        <!-- Display discount_percentage from the discount relation -->
                        {{ $product->discount ? $product->discount->discount_percentage . '%' : 'No Discount' }}
                    </td>                    <td>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;"
                            onsubmit="return confirm('Are you sure you want to delete this Product? All their data will be lost!');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div>

<style>
.pagination .page-item .page-link {
    background-color: #9b7a52;
    border-color:white;
    color: white;
}

.pagination .page-item .page-link:hover {
    background-color: #7a5b3e;
    border-color: #7a5b3e;
}
</style>

@endsection

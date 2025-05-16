@extends('layouts.app_admin')

@section('title', 'Edit Product')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container">
        <h1 class="mb-4" style="color: #9b7a52">Edit Product: {{ $inventoryItem->product->name }}</h1>

        <!-- Edit Form -->
        <div class="card shadow-sm mb-4">
            <div class="card-header" style="background-color: #f8f9fa;">
                <h4 class="mb-0">Edit Product Details</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.inventory.update', $inventoryItem->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="stock_quantity">Stock Quantity</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $inventoryItem->stock_quantity) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Price (JD)</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $inventoryItem->product->price) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description', $inventoryItem->product->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn text-white" style="background-color: #9b7a52">Update Product</button>
                    <a href="{{ route('admin.inventory.index') }}" class="btn btn-secondary ml-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

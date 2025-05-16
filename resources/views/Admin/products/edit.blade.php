{{-- resources/views/admin/products/edit.blade.php --}}

@extends('layouts.app_admin')

@section('title', 'Edit Product')

@section('content')
<div id="right-panel" class="right-panel">

    <div class="container">
        <h1>Edit Product</h1>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label for="category_id">Product Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="weight">Product Weight (kg)</label>
                <input type="number" class="form-control" id="weight" name="weight" value="{{ $product->weight }}" placeholder="Enter product weight">
            </div>

            <div class="form-group">
                <label for="dimensions">Product Dimensions (LxWxH)</label>
                <input type="text" class="form-control" id="dimensions" name="dimensions" value="{{ $product->dimensions }}" placeholder="Enter product dimensions">
            </div>

            <div class="form-group">
                <label for="color">Product Color</label>
                <input type="text" class="form-control" id="color" name="color" value="{{ $product->color }}" placeholder="Enter product color">
            </div>

            <div class="form-group">
                <label for="size">Product Size</label>
                <input type="text" class="form-control" id="size" name="size" value="{{ $product->size }}" placeholder="Enter product size">
            </div>

            <div class="form-group">
                <label for="model">Product Model</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $product->model }}" placeholder="Enter product model">
            </div>

            <div class="form-group">
                <label for="shipping">Shipping Information</label>
                <textarea class="form-control" id="shipping" name="shipping" placeholder="Enter shipping information">{{ $product->shipping }}</textarea>
            </div>

            <div class="form-group">
                <label for="care_info">Care Information</label>
                <textarea class="form-control" id="care_info" name="care_info" placeholder="Enter care instructions">{{ $product->care_info }}</textarea>
            </div>

            <div class="form-group">
                <label for="brand">Product Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $product->brand }}" placeholder="Enter product brand">
            </div>

            <div class="form-group">
                <label for="discount_id">Discount ID</label>
                <input type="number" class="form-control" id="discount_id" name="discount_id" value="{{ $product->discount_id }}" placeholder="Enter discount ID (optional)">
            </div>

            <div class="form-group">
                <label for="images">Product Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
                
                @if($product->productImages->isNotEmpty())
                    <div class="mt-3">
                        <h5>Current Images:</h5>
                        <div class="row">
                            @foreach($product->productImages as $image)
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                                    <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"> Delete
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            

            <div class="form-group">
                <button type="submit" class="btn" style="background-color: #b18b5e; color: white;">Update Product</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ml-3">Cancel</a>

            </div>
        </form>
    </div>
</div>
@endsection

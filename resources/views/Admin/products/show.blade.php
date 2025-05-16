@extends('layouts.app_admin')

@section('title', 'Product Details')

@section('content')

<div id="right-panel" class="right-panel">
    <div class="container">
        <h1 class="my-4" style="color: #9b7a52">Product Details</h1>

        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title font-weight-bold" style="color: #b18b5e">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p><strong>Price:</strong> JD{{ number_format($product->price, 2) }}</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <h6>Product Images</h6>
                        <div class="row justify-content-center">
                            @foreach($product->productImages as $image)
                                <div class="col-md-4 mb-2 d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                                         alt="Product Image" 
                                         class="img-fluid rounded shadow-sm" 
                                         style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Sales Count:</strong> {{ $product->sales_count }}</p>
                        <p><strong>Category ID:</strong> {{ $product->category_id }}</p>
                        <p><strong>Weight:</strong> {{ $product->weight }} kg</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Dimensions:</strong> {{ $product->dimensions }}</p>
                        <p><strong>Color:</strong> {{ $product->color }}</p>
                        <p><strong>Size:</strong> {{ $product->size }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Model:</strong> {{ $product->model }}</p>
                        <p><strong>Brand:</strong> {{ $product->brand }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Shipping Info:</strong> {{ $product->shipping }}</p>
                        <p><strong>Care Instructions:</strong> {{ $product->care_info }}</p>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="{{ route('admin.products.index') }}" class="btn text-light" style="background-color: #b18b5e">Back to All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

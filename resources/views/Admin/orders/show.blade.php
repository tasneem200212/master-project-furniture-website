@extends('layouts.app_admin')

@section('title', 'Order Details')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container">
        <h1 class="my-4" style="color: #9b7a52">Order Details</h1>

        <!-- Order Details Card -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title">Order ID: {{ $order->id }}</h5>
                <p><strong>Customer Name:</strong> {{ $order->user->name }}</p>
                <p><strong>Total Price:</strong> JD{{ number_format($order->total_price, 2) }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('d M, Y') }}</p>

                <!-- Ordered Products Section -->
                <h6 class="mt-4">Ordered Products:</h6>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4 mb-3">
                            <div class="card equal-height">
                                <img src="{{ asset('storage/' . $product->productImages->first()->image_path) }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">Quantity: {{ $product->pivot->quantity }}</p> <!-- عرض الكمية من الـ pivot -->
                                    <p class="card-text">Price: JD{{ number_format($product->price, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('admin.orders.index') }}" class="btn mt-3" style="background-color: #b18b5e; color: white;">Back to All Orders</a>
            </div>
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }} 
        </div>
    </div>
</div>
@endsection

<style>
.card.equal-height {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.card.equal-height .card-body {
    flex-grow: 1;
}

.pagination .page-item .page-link {
    background-color: #9b7a52;
    border-color: white;
    color: white;
}

.pagination .page-item .page-link:hover, 
.pagination .page-item .page-link:focus {
    background-color: #7a5b3e;
    border-color: #7a5b3e;
    outline: none;
    box-shadow: none;
}

.pagination .page-item.active .page-link {
    background-color: #7a5b3e;
    border-color: #7a5b3e;
}
</style>

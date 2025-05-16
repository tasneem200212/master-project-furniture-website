@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg rounded-4 overflow-hidden border-0">
                <!-- Order Header -->
                <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #9b7a52 0%, #b18b5e 100%);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-0 fw-bold text-light"><i class="fas fa-receipt me-2"></i> Order #{{ $order->id }}</h2>
                        <span class="badge bg-white text-dark fs-6 p-2 rounded-pill">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

                <div class="card-body p-4 p-lg-5">
                    <!-- Order Summary -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="bg-light p-3 rounded-3 h-100">
                                <h5 class="fw-bold mb-3 text-secondary"><i class="fas fa-info-circle me-2"></i>Order Summary</h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Order Date:</span>
                                    <span class="fw-bold">{{ $order->created_at->format('d M Y, h:i A') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Items:</span>
                                    <span class="fw-bold">{{ $order->products->sum('pivot.quantity') }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Total Amount:</span>
                                    <span class="fw-bold fs-5" style="color: #9b7a52;">JD{{ number_format($order->total_price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="bg-light p-3 rounded-3 h-100">
                                <h5 class="fw-bold mb-3 text-secondary"><i class="fas fa-truck me-2"></i>Delivery Info</h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Shipping Address:</span>
                                    <span class="fw-bold text-end">
                                        {{ optional($order->shippingAddress)->address ?? 'Address not available' }}
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Payment Method:</span>
                                    <span class="fw-bold">
                                        {{ optional($order->paymentMethod)->method_name ?? 'Payment method not available' }}

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products List -->
                    <h5 class="fw-bold mb-4 text-secondary"><i class="fas fa-box-open me-2"></i>Order Items</h5>
                    
                    @if($order->products && $order->products->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="bg-light">
                                        <th scope="col" style="width: 60px;"></th>
                                        <th scope="col">Product</th>
                                        <th scope="col" class="text-center">Price</th>
                                        <th scope="col" class="text-center">Qty</th>
                                        <th scope="col" class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->products as $item)
                                    <tr>
                                        <td>
                                            @if ($item->productImages->isNotEmpty())
                                                <img src="{{ asset('storage/' . $item->productImages->first()->image_path) }}" 
                                                     alt="{{ $item->name }}" 
                                                     class="img-fluid rounded" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('storage/default-image.jpg') }}" 
                                                     alt="Default Image" 
                                                     class="img-fluid rounded" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <h6 class="mb-0">{{ $item->name }}</h6>
                                        </td>
                                        <td class="align-middle text-center">JD{{ number_format($item->price, 2) }}</td>
                                        <td class="align-middle text-center">{{ $item->pivot->quantity }}</td>
                                        <td class="align-middle text-end fw-bold">JD{{ number_format($item->price * $item->pivot->quantity, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end fw-bold">Shipping:</td>
                                        <td class="text-end">JD{{ number_format($shippingCost, 2) }}</td>
                                    </tr>                                    
                                    <tr>
                                        <td colspan="4" class="text-end fw-bold">Total:</td>
                                        <td class="text-end fw-bold fs-5" style="color: #9b7a52;">JD{{ number_format($order->total_price, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center py-4">
                            <i class="fas fa-info-circle fa-2x mb-3"></i>
                            <h5>No products in this order</h5>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between mt-5">
                        <a href="{{ route('user.profile') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                            <i class="fas fa-arrow-left me-2"></i> Back to Profile
                        </a>
                        <div>
                            <!-- Cancel Order Button -->
                            <form action="{{ route('order.cancel', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') <!-- Assuming you're using a DELETE request -->
                                <button class="btn btn-outline-danger rounded-pill px-4 py-2 me-2" type="submit">
                                    <i class="fas fa-times me-2"></i> Cancel Order
                                </button>
                            </form>
                    
                            <!-- Print Invoice Button -->
                            <button class="btn btn-primary rounded-pill px-4 py-2" style="background-color: #9b7a52; border-color: #8a6d49;" onclick="window.print();">
                                <i class="fas fa-print me-2"></i> Print Invoice
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .table th {
        border-top: none;
        border-bottom: 2px solid #dee2e6;
    }
    
    .table td {
        vertical-align: middle;
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
    
    .rounded-4 {
        border-radius: 1rem !important;
    }
</style>
@endsection
@extends('layouts.app')

@section('title', 'Ecommerce Furniture - Cart')

@section('content')

<main>
    <!-- Breadcrumb area start -->
    <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
        <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg.jpg"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-12">
                    <div class="breadcrumb__wrapper text-center">
                        <h2 class="breadcrumb__title">Cart</h2>
                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('Pro.index') }}">Home</a></span></li>
                                    <li><span>Cart</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area end -->

    <!-- Cart area start -->
    <div class="cart-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('product-details', $item->product->id) }}">
                                                <img src="{{ asset('storage/' . $item->product->productImages->first()->image_path) }}" alt="{{ $item->product->name }}">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('product-details', $item->product->id) }}">{{ $item->product->name }}</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">JD{{ number_format($item->product->price, 2) }}</span>
                                        </td>
                                        <td class="product-quantity text-center">
                                            <div class="product-quantity mt-10 mb-10">
                                                <div class="product-quantity-form">
                                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="quantity-form">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="input-group" style="max-width: 140px;">
                                                            <button type="button" class="btn btn-outline-secondary cart-minus">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <input class="form-control text-center cart-input" 
                                                                   type="number" 
                                                                   name="quantity" 
                                                                   value="{{ $item->quantity }}" 
                                                                   min="1">
                                                            <button type="button" class="btn btn-outline-secondary cart-plus">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">JD{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                                        </td>
                                        <td class="product-remove">
                                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon d-flex align-items-center">
                                    <form action="{{ route('cart.applyCoupon') }}" method="POST" class="coupon d-flex align-items-center">
                                        @csrf
                                        <input id="coupon_code" class="input-text" name="coupon_code" placeholder="Coupon code" type="text">
                                        <button class="fill-btn" type="submit">
                                            <span class="fill-btn-inner">
                                                <span class="fill-btn-normal">Apply Coupon</span>
                                                <span class="fill-btn-hover">Apply Coupon</span>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart Totals</h2>

                                @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                
                                <ul class="mb-20">
                                    <li>Subtotal <span>JD{{ number_format($subtotal, 2) }}</span></li>
                                    @if($coupon)
                                    <li>Discount ({{ $coupon->code }} - {{ round($coupon->discount_percentage) }}%) <span>-JD{{ number_format($discountAmount, 2) }}</span></li>
                                    <li>Total after Discount <span>JD{{ number_format($total, 2) }}</span></li>
                                    @else
                                    <li>No coupon applied</li>
                                    @endif
                                </ul>
                                <a class="fill-btn" href="{{ route('checkout.index') }}">
                                    <span class="fill-btn-inner">
                                        <span class="fill-btn-normal">Proceed to Checkout</span>
                                        <span class="fill-btn-hover">Proceed to Checkout</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart area end -->
</main>

@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Quantity adjustment functionality
    const minusButtons = document.querySelectorAll('.cart-minus');
    const plusButtons = document.querySelectorAll('.cart-plus');
    const quantityInputs = document.querySelectorAll('.cart-input');

    function updateCartItem(form) {
        fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'X-HTTP-Method-Override': 'PUT'
            },
            body: new URLSearchParams(new FormData(form))
        })
        .then(response => {
            if (response.ok) {
                window.location.reload(); // Refresh to see updated totals
            } else {
                console.error('Update failed');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    minusButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const form = btn.closest('.quantity-form');
            const input = form.querySelector('.cart-input');
            let value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
                updateCartItem(form);
            }
        });
    });

    plusButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const form = btn.closest('.quantity-form');
            const input = form.querySelector('.cart-input');
            let value = parseInt(input.value);
            input.value = value + 1;
            updateCartItem(form);
        });
    });

    quantityInputs.forEach(function (input) {
        input.addEventListener('change', function () {
            const form = input.closest('.quantity-form');
            if (parseInt(input.value) >= 1) {
                updateCartItem(form);
            }
        });
    });
});
</script>
@endsection
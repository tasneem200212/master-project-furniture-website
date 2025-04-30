<!-- resources/views/payment/paypal.blade.php -->
@extends('layouts.app')

@section('title', 'PayPal Payment')

@section('content')
    <h3>Pay with PayPal</h3>
    <p>Order Total: ${{ number_format($order->total_price, 2) }}</p>
    <!-- هنا يمكنك إضافة تكامل PayPal الفعلي -->
    <form action="..." method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Pay with PayPal</button>
    </form>
@endsection

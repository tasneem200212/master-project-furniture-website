<!-- resources/views/payment/bank.blade.php -->
@extends('layouts.app')

@section('title', 'Bank Transfer Payment')

@section('content')
    <h3>Bank Transfer Payment</h3>
    <p>Order Total: ${{ number_format($order->total_price, 2) }}</p>
    <p>Please transfer the payment to the following bank details:</p>
    <!-- أضف هنا تفاصيل التحويل البنكي -->
    <p>Bank: XYZ Bank</p>
    <p>Account Number: 123456789</p>
    <p>Sort Code: 12-34-56</p>
    <p>Reference: Order #{{ $order->id }}</p>
@endsection

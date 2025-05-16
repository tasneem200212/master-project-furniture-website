@extends('layouts.app_admin')

@section('title', 'Edit Order')

@section('content')
<div id="right-panel" class="right-panel">

    <div class="container">
        <h1 style="color: #9b7a52">Edit Order</h1>

        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- استخدام PUT لتحديث الطلب -->
            
            <div class="form-group">
                <label for="status">Order Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>completed</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <button type="submit" class="btn text-light m-3" style="background-color: #b18b5e">Update Order</button>
        </form>
    </div>
</div>
@endsection

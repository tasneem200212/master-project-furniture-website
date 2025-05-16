@extends('layouts.app_admin')

@section('title', 'All Orders')

@section('content')
<div id="right-panel" class="right-panel">

<div class="container">
    <h1 style="color: #9b7a52">All Orders</h1>

    <!-- نموذج البحث -->
    <form method="GET" action="{{ route('admin.orders.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by Customer Name" value="{{ request()->get('search') }}">
            </div>
            <div class="col-md-4">
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="complete" {{ request()->get('status') == 'complete' ? 'selected' : '' }}>Complete</option>
                    <option value="shipped" {{ request()->get('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn text-light" style="background-color: #b18b5e">Search</button>
            </div>
        </div>
    </form>

    <!-- جدول الطلبات -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Total Price (JD)</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>JD{{ number_format($order->total_price, 2) }}</td> <!-- عرض إجمالي السعر -->
                    <td>{{ $order->created_at->format('d M, Y') }}</td> <!-- عرض تاريخ الإنشاء -->
                    <td>
                        {{-- <span class="badge 
                            @if(strtolower(trim($order->status)) == 'complete')
                                badge-complete
                            @elseif(strtolower(trim($order->status)) == 'pending')
                                badge-pending
                            @elseif(strtolower(trim($order->status)) == 'shipped')
                                badge-shipped
                            @else
                                badge-default
                            @endif
                        ">
                            {{ ucfirst(trim($order->status)) }}
                        </span> --}}
                        <p>{{ $order->status }}</p>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-warning btn-sm">Show</a>
                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;"
                            onsubmit="return confirm('Are you sure you want to delete this order? All their data will be lost!');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<style>
    .badge-complete {
        background-color: green;
        color: white;
    }

    .badge-pending {
        background-color: orange;
        color: white;
    }

    .badge-shipped {
        background-color: blue;
        color: white;
    }

    .badge-default {
        background-color: grey;
        color: white;
    }
</style>
@endsection




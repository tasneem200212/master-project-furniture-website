@extends('layouts.app_admin')

@section('title', 'All Orders')

@section('content')
<div id="right-panel" class="right-panel">

<div class="container">
    <h1 style="color: #9b7a52">All Orders</h1>

    <form method="GET" action="{{ route('admin.orders.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by Customer Name" value="{{ request()->get('search') }}">
            </div>
            <div class="col-md-4">
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ request()->get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="processing" {{ request()->get('status') == 'processing' ? 'selected' : '' }}>processing</option>
                    <option value="canceled" {{ request()->get('status') == 'canceled' ? 'selected' : '' }}>canceled</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn text-light" style="background-color: #b18b5e">Search</button>
            </div>
        </div>
    </form>

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
                    <td>JD{{ number_format($order->total_price, 2) }}</td>
                    <td>{{ $order->created_at->format('d M, Y') }}</td>
                    <td>
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
            <div class="d-flex justify-content-center">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>  
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
    .pagination .page-item .page-link {
    background-color: #9b7a52;
    border-color:white;
    color: white;
}

.pagination .page-item .page-link:hover {
    background-color: #7a5b3e;
    border-color: #7a5b3e;
}
</style>
@endsection